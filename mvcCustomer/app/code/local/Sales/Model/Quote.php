<?php

class Sales_Model_Quote extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote';
        $this->_modelClass = 'sales/quote';
    }

    // public function initQuote()
    // {
    //     if (Mage::getSingleton("core/session")->get("quote_id")) {
    //         $quoteId = Mage::getSingleton("core/session")->get("quote_id");
    //         $this->load($quoteId);
    //     } elseif (!$this->getId()) {
    //         $quote = Mage::getModel("sales/quote")
    //             ->setData(["tax_percent" => 8, "grand_total" => 0])
    //             ->save();
    //         Mage::getSingleton("core/session")->set("quote_id", $quote->getId());
    //         $quoteId = $quote->getId();
    //         $this->load($quoteId);
    //     }
    //     return $this;
    // }
    public function initQuote()
    {
        $quoteId = Mage::getSingleton("core/session")->get("quote_id");
        $customerId = Mage::getSingleton("core/session")->get("customer_id");
        if (!$quoteId) {
            $quote = Mage::getModel("sales/quote")
                ->setData(["tax_percent" => 8, "grand_total" => 0]);
            if ($customerId) {
                $cartExist = Mage::getModel('sales/quote')->getCollection()
                    ->addFieldToFilter('order_id', 0)
                    ->addFieldToFilter('customer_id', $customerId)
                    ->addOrderBy('quote_id', 'DESC')
                    ->getFirstItem();
                if ($cartExist) {
                    $quote->addData('quote_id', $cartExist->getId());
                }
                $quote->addData('customer_id', $customerId);
            }
            $quoteId = $quote->save()->getId();
            Mage::getSingleton("core/session")->set("quote_id", $quote->getId());
        } else {
            if ($customerId) {
                $quoteId = Mage::getModel("sales/quote")->load($quoteId)
                    ->addData('customer_id', $customerId)
                    ->save()
                    ->getId();
            }
        }
        $this->load($quoteId);
        return $this;
    }

    public function getItemCollection()
    {
        return Mage::getModel('sales/quote_item')->getCollection()
            ->addFieldToFilter('quote_id', $this->getId());
    }
    public function getAddressCollection()
    {
        return Mage::getModel('sales/quote_customer')->getCollection()
            ->addFieldToFilter('quote_id', $this->getId());
    }
    protected function _beforeSave()
    {
        $grandTotal = 0;
        foreach ($this->getItemCollection()->getData() as $_item) {
            $grandTotal += (int) $_item->getRowTotal();
        }
        if ($this->getTaxPercent()) {
            $tax = round($grandTotal / $this->getTaxPercent(), 2);
            $grandTotal = $grandTotal + $tax;
        }
        $this->addData('grand_total', $grandTotal);
    }

    public function addProduct($request)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel("sales/quote_item")->addItem($this, $request['product_id'], $request['qty']);
        }
        $this->save();
    }
    public function removeProduct($id)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel('sales/quote_item')->removeItem($this, $id);
        }
        $this->save();
    }
    public function updateProduct($data)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel('sales/quote_item')->updateItem($this, $data['item_id'], $data['qty']);
        }
        $this->save();
    }
    public function addAddress($request)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel('sales/quote_customer')->addCustomerAddress($this, $request);
        }
        $this->save();
    }
    public function addShippingMethod($request)
    {
        $this->initQuote();
        if ($this->getId()) {
            $id = Mage::getModel('sales/quote_shipping')->addShipping($this, $request)->getId();
        }
        $this->addData('shipping_id', $id)->save();
    }
    public function addPaymentMethod($request)
    {
        $this->initQuote();
        if ($this->getId()) {
            $id = Mage::getModel('sales/quote_payment')->addPayment($this, $request)->getId();
        }
        $this->addData('payment_id', $id)->save();
    }
    public function getPayment()
    {
        return Mage::getModel('sales/quote_payment')
            ->getCollection()
            ->addFieldToFilter('quote_id', $this->getId());
    }
    public function getShipping()
    {
        return Mage::getModel('sales/quote_shipping')
            ->getCollection()
            ->addFieldToFilter('quote_id', $this->getId());
    }

    public function convert()
    {
        $this->initQuote();
        if ($this->getId()) {
            $order = $this->convertQuoteToOrder();
            $address = $this->convertAddress($order->getId());
            $item = $this->convertItems($order->getId());
            $paymentId = $this->convertPayment($order->getId());
            $shippingId = $this->convertShipping($order->getId());

            $this->addData('order_id', $order->getId())->save();

            $order->addData('payment_id', $paymentId);
            $order->addData('shipping_id', $shippingId);
            $order->save();
            $this->addHistory($order->getId());
        }

    }
    public function convertQuoteToOrder()
    {
        $order = Mage::getModel('sales/order')->addOrder($this);
        return $order;
    }
    public function convertItems($orderId)
    {
        if ($this->getId()) {
            foreach ($this->getItemCollection()->getData() as $_item) {
                $_item->addData('order_id', $orderId);
                Mage::getModel('sales/order_item')->addOrderItem($_item);
            }
            return $this;
        }
    }
    public function convertAddress($orderId)
    {
        $this->initQuote();
        if ($this->getId()) {
            $addressData = Mage::getModel('sales/quote_customer')
                ->getCollection()
                ->addFieldToFilter('quote_id', $this->getId())
                ->getFirstItem();
            $addressData->addData('order_id', $orderId);
            $address = Mage::getModel('sales/order_customer')->addAddress($addressData);
            return $address;
        }
    }
    public function convertPayment($orderId)
    {
        $this->initQuote();
        if ($this->getId()) {
            $paymentdata = Mage::getModel('sales/quote_payment')
                ->getCollection()
                ->addFieldToFilter('quote_id', $this->getId())
                ->getFirstItem();
            $paymentdata->addData('order_id', $orderId);
            $paymentId = Mage::getModel('sales/order_payment')->addPayment($paymentdata)->getId();
        }
        return $paymentId;
    }
    public function convertShipping($orderId)
    {
        $this->initQuote();
        if ($this->getId()) {
            $shippingdata = Mage::getModel('sales/quote_shipping')
                ->getCollection()
                ->addFieldToFilter('quote_id', $this->getId())
                ->getFirstItem();
            $shippingdata->addData('order_id', $orderId);
            $shippingId = Mage::getModel('sales/order_shipping')->addShipping($shippingdata)->getId();
        }
        return $shippingId;
    }
    public function addHistory($orderId)
    {
        Mage::getModel('sales/order_history')->addHistory($orderId);
        return $this;
    }
}

