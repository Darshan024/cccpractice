<?php
class View_Product
{
    public $pdata=[];
    public function __construct()
    {

    }
    public function createtextfield($name, $title,$value='', $id = '')
    {
        // $key=preg_replace('/^pdata\[(\w+)\]$/','$1',$name);
        // $value=isset($this->)
        return "<span>" . $title . '</span><input id="' . $id . '" type="text" name="' . $name . '" value="' . $value . '"/>';
    }
    
    public function createhidden($name, $value = '', $id = '')
    {
        return '<input type="hidden" name="' . $name . '" value = "' . $value . '" id="' . $id . '"/>';
    }
    public function createform()
    {
        if(array_key_exists('pname',$this->pdata)){
            $this->pdata=$this->pdata;
        }
        else{ 
            $this->pdata['product_id']='';
            $this->pdata['pname']='';
            $this->pdata['sku']='';
            $this->pdata['ptype']='';
            $this->pdata['category']='';
            $this->pdata['manufacture_cost']='';
            $this->pdata['shipping_cost']='';
            $this->pdata['total_cost']='';
            $this->pdata['price']='';
            $this->pdata['stetus']='';
            $this->pdata['created_at']='';
            $this->pdata['updated_at']='';
        }
        $action = isset($_GET['action']) && $_GET['action'] === 'edit' ? 'update' : 'save';
        $form = "<form action='$action' method='POST'>";
        $form .= '<div>';
        $form .= $this->createtextfield("pdata[pname]", "Product Name ",$this->pdata['pname']);
        $form .= '</div>';
        $form .= '<div>';
        $form .= $this->createtextfield("pdata[sku]", "sku:",$this->pdata['sku']);
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createradio("pdata[ptype]", "Product Type", array("Simple" => "Simple", "Bundle" => "Bundle"),$this->pdata['ptype']);
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createdropdown("pdata[category]", "Select Category", array("Bar & GameRoom" => "Bar & GameRoom", "BedRoom" => "BedRoom", "Decor" => "Decor", "Dining & Kithcen" => "Dining & Kitchen", "Lighting" => "Lighting", "Living_Room" => "Living Room", "Matesses" => "Matresses", "Office" => "Office", "Outdoor" => "Outdoor"),$this->pdata['category']);
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createtextfield("pdata[manufacture_cost]", "Manufacture Cost ",$this->pdata['manufacture_cost']);
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createtextfield("pdata[shipping_cost]", "Shipping Cost ",$this->pdata['shipping_cost']);
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createtextfield("pdata[total_cost]", "Total Cost ",$this->pdata['total_cost']);
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createtextfield("pdata[price]", "Price ",$this->pdata['price']);
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createdropdown("pdata[stetus]", "Select status ", array("Enabled" => "Enabled", "Disabled" => "Disabled"),$this->pdata['stetus']);
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createdatefield("pdata[created_at]", "Created date ",$this->pdata['created_at']);
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createdatefield("pdata[updated_at]", "Updated date ",$this->pdata['updated_at']);
        $form .= '</div>';
        
        $form .= '<div>';
        $form .= $this->createhidden("pdata[product_id]",$this->pdata['product_id']);
        $form .= '</div>';

        $form .= '<div>';
        $form .= $this->createsubmitbtn('Submit');
        $form .= '</div>';
        $form .= '<br>';
        $form .= '<div>';
        $form .= $this->createsubmitbtn('Update');
        $form .= '</div>';
        $name="Darshan";
        return $form;
    }
    public function createdropdown($name, $title, $options = [],$check, $id = '')
    {
        $dropdown='<span>'.$title.'</span>';
        $dropdown.='<select id="'.$id.'" name="'.$name.'">';
        foreach($options as $value=>$label){
            $checked=($check==$value)?'selected':'';
            $dropdown.='<option value="'.$value.'"'.$checked.'>'.$label.'</option>';
        }
        $dropdown.='</select>';
        return $dropdown;
    }
    public function createradio($name, $title, $options = [],$check)
    {
        $radio = '<span>' . $title . '</span>';
        foreach ($options as $value => $label) {
            $checked=($check==$value)?'checked':'';
            $radio .= '<input type="radio" name="' . $name . '" value="' . $value . '"'.$checked.'/>' . $label;
        }
        return $radio;
    }
    public function createdatefield($name, $title, $value = '',$id='')
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
    public function setData($result){
        $row=mysqli_fetch_assoc($result);
        $this->pdata=$row;
        return $this->pdata;
    }
    public function check(){
        print_r($this->pdata);
    }
    
    
}
