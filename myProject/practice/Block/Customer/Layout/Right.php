<?php

namespace Block\Customer\Layout;

\Mage::loadFileByClassName('Block\Core\Template');

class Right extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Customer/Layout/right.php');
    }
}
?>