<?php
class Mage
{
    private static $registry = [];
    private static $baseDir = 'C:/xampp/htdocs/Practice/mvcCatalog';
    private static $baseUrl = 'http://localhost/Practice/mvcCatalog';
    public static function init()
    {
        $frontController = new Core_Controller_Front();
        $frontController->init();
    }
    public static function getModel($modelName)
    {
        $modelName = ucwords(str_replace("/", "_Model_", $modelName), "_");
        return new $modelName;
    }
    public static function getBlock($blockname)
    {
        $blockname = ucwords(str_replace("/", "_Block_", $blockname), "_");
        return new $blockname;
    }
    public static function getSingleton($className)
    {

    }
    public static function register($key, $value)
    {

    }
    public static function registry($key)
    {

    }
    public static function getBaseDir($subDir = null)
    {
        if ($subDir) {
            return self::$baseDir . '/' . $subDir;
        }
        return self::$baseDir;
    }
    public static function getBaseUrl($path)
    {
        if ($path) {
            return self::$baseUrl . "/" . $path;
        } else {
            return self::$baseUrl . $path;
        }
    }

}

?>