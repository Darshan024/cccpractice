<?php
class View_Product
{
    public function __construct()
    {
    }
    public function createtextfield($name, $title, $value = '', $id = '')
    {
        return "<span>" . $title . '</span><input id="' . $id . '" type="text" name="' . $name . '" value="' . $value . '"/>';
    }
    public function createform()
    {
        $form = "<form action='' method='POST'>";
        $form .= '<div>';
        $form .= $this->createtextfield("pdata[pname]", "Product_name ");
        $form .= '</div>';
        $form .= '<div>';
        $form .= $this->createtextfield("pdata[sku]", "sku ");
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createradio("pdata[ptype]", "Product Type", array("Simple" => "Simple", "Bundle" => "Bundle"));
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createdropdown("pdata[category]", "Select Category", array("Bar & GameRoom" => "Bar & GameRood", "BedRoom" => "BedRoom", "Decor" => "Decor", "Dining & Kithcen" => "Dining & Kitchen", "Lighting" => "Lighting", "Living_Room" => "Living Room", "Matesses" => "Matresses", "Office" => "Office", "Outdoor" => "Outdoor"));
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createtextfield("pdata[manufacture_cost]", "Manufacture Cost ");
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createtextfield("pdata[shipping_cost]", "Shipping Cost ");
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createtextfield("pdata[total_cost]", "Total Cost ");
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createtextfield("pdata[price]", "Price ");
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createdropdown("pdata[stetus]", "Select status ", array("Enabled" => "Enabled", "Disabled" => "Disabled"));
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createdatefield("pdata[created_at]", "Created date ");
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createdatefield("pdata[updated_at]", "Updated date ");
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createsubmitbtn('Submit');
        $form .= '</div>';
        return $form;
    }
    public function createdropdown($name, $title, $options = [], $id = '')
    {

    
        $dropdown='<span>'.$title.'</span>';
        $dropdown.='<select id="'.$id.'" name="'.$name.'">';
        foreach($options as $value=>$label){
            $dropdown.='<option value="'.$value.'">'.$label.'</option>';
        }
        $dropdown.='</select>';
        return $dropdown;
    
    }
    public function createradio($name, $title, $options = [], $id = '')
    {
        $radio = '<span>' . $title . '</span>';
        foreach ($options as $value => $label) {
            $radio .= '<input type="radio" name="' . $name . '" value="' . $value . '"/>' . $label;
        }
        return $radio;
    }
    public function createdatefield($name, $title, $id = '', $value = '')
    {
        return $date = '<span>' . $title . '</span><input type="date" name="' . $name . '"id="' . $id . '"value="' . $value . '"/>';
    }
    public function createsubmitbtn($title)
    {
        return '<input type="submit" name="submit" value="' . $title . '">';
    }
    public function tohtml()
    {
        return $this->createform();
    }
}
