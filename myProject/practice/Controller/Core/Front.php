<?php

namespace Controller\Core;

class Front{
    public static function init(){
        $request = \Mage::getModel('Model\Core\Request');
        $controllerName = ucfirst($request->getControllerName());
        $actionName = $request->getActionName().'Action';

        $controllerName = self::prepareClassName($controllerName, "controller");
        $controller = \Mage::getController($controllerName);
        $controller->$actionName();
    }

    public function prepareClassName($key, $nameSpace)      
    {
        $className = $nameSpace."_".$key;
        $className = str_replace("_", " ", $className);
        $className = ucwords($className);
        $className = str_replace(" ", "\\", $className);
        return $className;
    }
}
?>