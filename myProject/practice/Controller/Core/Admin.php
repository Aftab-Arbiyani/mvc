<?php

namespace Controller\Core;
use Mage;
use Exception;

Mage::loadFileByClassName('Block\Core\Layout');
Mage::loadFileByClassName('Controller\Core\Abstracts');

class Admin extends Abstracts
{
    public function setLayout(\Block\Core\Layout $layout = null)
    {
        if(!$layout)
        {
            $layout = \Mage::getBlock('Block\Admin\Layout');
        }
        if (!($layout instanceof \Block\Admin\Layout)) {
            throw new Exception('Must be instance of Block\Admin\Layout');
        }
        $this->layout = $layout;
        return $this;
    }
    public function setMessage()
    {
        $this->message = \Mage::getModel('Model\Admin\Message');
        return $this;
    }
}
?>