<?php

namespace Block\Admin\Cms;
use Mage;
 
Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit 
{
    public function __construct()
    {
        parent::__construct(); 
        $this->setTemplate('./View/Admin/Cms/update.php');
    }
}

?>