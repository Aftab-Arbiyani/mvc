<?php

namespace Block\Admin\CustomerGroup;
use Mage;

Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{ 
    public function __construct() 
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/CustomerGroup/update.php');
    }
}

?>