<?php

namespace Model\Core;

\Mage::loadFileByClassName('Model\Core\Session');

class Message extends Session
{
    public function setSuccess($message){
        $this->success = $message;
        return $this;
    }
    public function getSuccess(){
        if(!$this->success){
            $this->setSuccess();
        }
        return $this->success;
    }
    public function setFailure($message){
        $this->failure = $message;
        return $this;
    }
    public function getFailure(){
        if(!$this->failure){
            $this->setFailure();
        }
        return $this->failure;
    }
    public function clearSuccess(){
        unset($this->success);
        return $this;
    }
    public function clearFailure(){
        unset($this->failure);
        return $this;
    }
}

?>