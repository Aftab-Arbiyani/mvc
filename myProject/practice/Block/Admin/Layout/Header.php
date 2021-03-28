<?php

namespace Block\Admin\Layout;

class Header extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Layout/header.php');
    }
}
?>