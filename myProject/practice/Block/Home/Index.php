<?php

namespace Block\Home;
use Mage;

Mage::loadFileByClassName('Block\Core\Template');

class Index extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Home/index.php');
    }
}

?>