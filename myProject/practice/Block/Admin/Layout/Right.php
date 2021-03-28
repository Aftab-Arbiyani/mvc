<?php

namespace Block\Admin\Layout;

class Right extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Layout/right.php');
    }
}
?>