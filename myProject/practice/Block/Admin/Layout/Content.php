<?php

namespace Block\Admin\Layout;

class Content extends \Block\Core\Template
{

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Layout/content.php');

    }
}
?>