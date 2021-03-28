<?php

namespace Block\Core;

class Layout extends Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Core/Layout/oneColumn.php');
        $this->prepareChild();
    }

    public function prepareChild()
    {
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Content'), 'content');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Header'), 'header');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Footer'), 'footer');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Left'), 'left');
        // $this->addChild(\Mage::getBlock('Block\Core\Layout\Right'), 'right');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Message'), 'message');

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