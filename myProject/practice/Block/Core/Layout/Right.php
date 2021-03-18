<?php

namespace Block\Core\Layout;

\Mage::loadFileByClassName('Block\Core\Template');

class Right extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Core/Layout/right.php');
    }
}
?>