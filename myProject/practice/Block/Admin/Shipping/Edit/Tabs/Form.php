<?php 

namespace Block\Admin\Shipping\Edit\Tabs;

class Form extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Shipping/Form/Tabs/form.php'); 
    }
}

?>