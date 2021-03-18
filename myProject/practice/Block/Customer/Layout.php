<?php

namespace Block\Customer;
use Mage;

Mage::loadFileByClassName('Block\Core\Layout');

class Layout extends \Block\Core\Layout
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Customer/layout.php');
        $this->prepareChild();
    }
    public function prepareChild()
    {
        $this->addChild(Mage::getBlock('Block\Customer\Layout\Content'), 'content');
        $this->addChild(Mage::getBlock('Block\Customer\Layout\Header'), 'header');
        $this->addChild(Mage::getBlock('Block\Customer\Layout\Footer'), 'footer');
        $this->addChild(Mage::getBlock('Block\Customer\Layout\Left'), 'left');
        // $this->addChild(Mage::getBlock('Block\Customer\Layout\Right'), 'right');
        $this->addChild(Mage::getBlock('Block\Customer\Layout\Message'), 'message');
    }
    public function getContent()
    {
        return $this->getChild('content');
    }
    public function getLeft()
    {
        return $this->getChild('left');
    }
    public function getRight()
    {
        return $this->getChild('right');
    }
}


?>