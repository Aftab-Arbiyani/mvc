<?php

namespace Block\Home;

\Mage::loadFileByClassName('Block\Core\Template');

class Banner extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Home/banner.php');
    }
}

?>