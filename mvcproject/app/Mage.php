<?php
class Mage{
    public static function init(){
        
        $frontController = new Core_Controller_Front();
        $frontController->init();
    }
    public static function getmodel($modelName){
        $className = str_replace("/","_Model_",$modelName);
        $className=ucwords($className);
        return new $className();
    }
}

?>