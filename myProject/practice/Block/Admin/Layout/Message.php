<?php

namespace Block\Admin\Layout;

class Message extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Layout/message.php');
    }
}
?>