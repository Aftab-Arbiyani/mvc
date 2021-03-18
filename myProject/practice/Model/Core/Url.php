<?php

namespace Model\Core;
class Url
{
    protected $request = null;

    public function __construct()
    {
        $this->setRequest();
    }
    public function setRequest()
    {
        $this->request = \Mage::getController('Model\Core\Request');
        return $this;
    }
    public function getRequest()
    {
        return $this->request;
    }
    function geturl($actionName = null, $controllerName = null, $params = null, $resetParams = false)
    {
        $final = $this->getRequest()->getGet();
        if($resetParams){
            $final = [];
        }
        if($actionName == NULL){
            $actionName = $this->getRequest()->getActionName('a'); 
        }
        if($controllerName == NULL){
            $controllerName = $this->getRequest()->getControllerName('c');
        }
        $final['c'] = $controllerName;
        $final['a'] = $actionName;
        if(is_array($params)){
            $final = array_merge($final, $params);
        } 
        $queryString = http_build_query($final);
        return "http://localhost/myProject/practice/index.php?{$queryString}";
    }
    public function baseUrl($subUrl = null)
    {
        $url = 'http://localhost/myProject/practice/';
        if ($subUrl) {
            $url .= $subUrl;
        }
        return $url;
    }
}

?>