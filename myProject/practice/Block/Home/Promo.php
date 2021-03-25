<?php

namespace Block\Home;

\Mage::loadFileByClassName('Block\Core\Template');

class Promo extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Home/promo.php');
    }
}

?>