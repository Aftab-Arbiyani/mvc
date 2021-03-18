<?php

namespace Block\Admin;
use Mage;

Mage::loadFileByClassName('Block\Core\Layout');

class Layout extends \Block\Core\Layout
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/layout.php');
        $this->prepareChild();
    }

    public function prepareChild()
    {
        $this->addChild(Mage::getBlock('Block\Admin\Layout\Content'), 'content');
        $this->addChild(Mage::getBlock('Block\Admin\Layout\Header'), 'header');
        $this->addChild(Mage::getBlock('Block\Admin\Layout\Footer'), 'footer');
        $this->addChild(Mage::getBlock('Block\Admin\Layout\Left'), 'left');
        // $this->addChild(Mage::getBlock('Block\Admin\Layout\Right'), 'right');
        $this->addChild(Mage::getBlock('Block\Admin\Layout\Message'), 'message');
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