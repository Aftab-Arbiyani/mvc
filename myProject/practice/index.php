<?php

class Mage{
    public static function init()
    {
        self::loadFileByClassName('Controller\Core\Front');
        Controller\Core\Front::init();
    }

    public static function getController($className)
    {
        self::loadFileByClassName($className);

        $className = str_replace('\\', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '\\', $className);
        return new $className();
    }
    public static function getModel($className)
    {
        self::loadFileByClassName($className);

        $className = str_replace('\\', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '\\', $className);
        return new $className();
    }
    public static function getBlock($className, $ton = false)
    {
        if (!$ton) {
            self::loadFileByClassName($className);
            $className = str_replace('\\', ' ', $className);
            $className = ucwords($className);
            $className = str_replace(' ', '\\', $className);
            return new $className();
        }
        $value = self::getRegistry($className);
        $className = str_replace('\\', ' ', $className);
        $className = ucwords($className);   
        $className = str_replace(' ', '\\', $className);
        $value = new $className();
        self::setRegistry($className, $value);
        return $value;
    }

    public function setRegistry($key, $value)
    {
        $GLOBALS[$key] = $value;
    }
    public function getRegistry($key, $optional = null)
    {
        if (!array_key_exists($key, $GLOBALS)) {
            return $optional;
        }
        return $GLOBALS[$key];
    }
    public static function loadFileByClassName($className)
    {
        $className = str_replace('\\', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '\\', $className);
        $className = $className.'.php';
        require_once($className);
    }
    // public static function getBaseDir($subPath = null)
    // {
    //     if($subPath){
    //         return getcwd().DIRECTORY_SEPERATOR.$subPath;
    //     }
    //     return getcwd();
    // }
}

Mage::init();
?>