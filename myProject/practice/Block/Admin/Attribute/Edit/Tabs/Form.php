<?php

namespace Block\Admin\Attribute\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Edit');

class Form extends \Block\Core\Edit 
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Attribute/Form/Tabs/form.php');
    }
}

?>