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
    public function addpaymentMethod($request)
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
            $address = $this->convertAddress($order);
            $this->convertItems($order);
            $paymentId = $this->convertPayment($order);
            $shippingId = $this->convertShipping($order);

            $this->addData('order_id', $order->getId())->save();

            $order->addData('payment_id', $paymentId);
            $order->addData('shipping_id', $shippingId);
            $order->save();
        }

    }
    public function convertQuoteToOrder()
    {
        $this->removeData('order_id');
        $this->removeData('quote_id');
        $this->removeData('shipping_id');
        $this->removeData('payment_id');
        return Mage::getModel('sales/order')->setData($this->getData())->save();
    }
    public function convertItems($order)
    {
        foreach ($this->getItemCollection()->getData() as $_item) {
            $_item->removeData('quote_id');
            $_item->removeData('item_id');
            $_item->addData('order_id', $order->getId());
            $itemData = $_item->getData();
            Mage::getModel('sales/order_item')->setData($itemData)->save();
        }

    }
    public function convertAddress($order)
    {
        $this->initQuote();
        if ($this->getId()) {
            $addressData = Mage::getModel('sales/quote_customer')
                ->getCollection()
                ->addFieldToFilter('quote_id', $this->getQuoteId())
                ->getFirstItem();
            $addressData->removeData('quote_customer_id');
            $addressData->removeData('quote_id');
            $addressData->addData('order_id', $order->getId());
            $address = Mage::getModel('sales/order_customer')->setData($addressData->getData())->save();
        }
        return $address;
    }
    public function convertPayment($order)
    {
        $this->initQuote();
        if ($this->getId()) {
            $paymentdata = Mage::getModel('sales/quote_payment')
                ->getCollection()
                ->addFieldToFilter('quote_id', $this->getId())
                ->getFirstItem();
            $paymentdata->removeData('payment_id');
            $paymentdata->removeData('quote_id');
            $paymentdata->addData('order_id', $order->getId());
            $paymentId = Mage::getModel('sales/order_payment')->setData($paymentdata->getData())->save()->getId();
        }
        return $paymentId;
    }
    public function convertShipping($order)
    {
        $this->initQuote();
        if ($this->getId()) {
            $shippingdata = Mage::getModel('sales/quote_shipping')
                ->getCollection()
                ->addFieldToFilter('quote_id', $this->getId())
                ->getFirstItem();
            $shippingdata->removeData('shipping_id');
            $shippingdata->removeData('quote_id');
            $shippingdata->addData('order_id', $order->getId());
            $shippingId = Mage::getModel('sales/order_shipping')->setData($shippingdata->getData())->save()->getId();
        }
        return $shippingId;
    }
}

