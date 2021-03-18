<?php

namespace Block\Admin\Payment\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Edit');

class Form extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Payment/Form/Tabs/form.php');
    }
}

?>