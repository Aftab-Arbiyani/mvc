<?php

namespace Block\Admin\Layout;

class Left extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Layout/left.php');
    }
}
?>