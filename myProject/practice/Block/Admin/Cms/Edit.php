<?php

namespace Block\Admin\Cms;
use Mage;
 
class Edit extends \Block\Core\Edit 
{
    public function __construct()
    {
        parent::__construct(); 
        $this->setTemplate('./View/Admin/Cms/update.php');
    }
}

?>