<?php

namespace Block\Admin\Payment\Edit\Tabs;

class Form extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Payment/Form/Tabs/form.php');
    }
}

?>