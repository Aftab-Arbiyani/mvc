<?php

namespace Controller\Core;
use Mage;

class Abstracts
{

        protected $request = null;
        protected $layout = null;
        protected $message = null;
    
        public function __construct()
        {
            $this->setRequest();
            $this->setLayout();
            $this->setMessage();
        }
    
        public function setRequest()
        {
            $this->request = Mage::getController('Model\Core\Request');
            return $this;
        }
        
        public function getRequest()
        {
            return $this->request;
        }
        
        public function setLayout(\Block\Core\Layout $layout = null)
        {
            if(!$layout)
            {
                $layout = Mage::getBlock('Block\Core\Layout');
            }
    
            $this->layout = $layout;
            return $this;
        }
    
        public function renderLayout()
        {
            echo $this->getLayout()->toHtml();
        }
    
        public function getLayout()
        {
            return $this->layout;
        }
    
        function redirect($actionName = null, $controllerName = null, $params = null, $resetParams = false)
        {
            header("location: ". $this->geturl($actionName, $controllerName, $params, $resetParams));
            exit(0);
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
    
        public function setMessage()
        {
            $this->message = Mage::getModel('Model\Core\Message');
            return $this;
        }
    
        public function getMessage()
        {
            return $this->message;
        }
    
}

?>