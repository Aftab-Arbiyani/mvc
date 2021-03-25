<?php

namespace Block\Home;

\Mage::loadFileByClassName('Block\Core\Template');

class Slider extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Home/slider.php');
    }
}

?>