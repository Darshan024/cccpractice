<?php
class Mage
{
    private static $basedir = "C:/xampp/htdocs/Practice/mvcproject";
    public static function init()
    {

        $frontController = new Core_Controller_Front();
        $frontController->init();
    }
    public static function getmodel($modelName)
    {
        $className = str_replace("/", "_Model_", $modelName);
        $className = ucwords($className);
        return new $className();
    }

    public static function getBlock($className)
    {
        $className = str_replace("/", "_Block_", $className);
        $className = ucwords($className);
        return new $className();
    }
    public static function register($key, $value)
    {

    }
    public static function registry($key)
    {

    }
    public static function getBaseDir($subDir = null)
    {
        if($subDir){
            return self::$basedir . '/' . $subDir;
        }
        return self::$basedir;
    }

}

?>