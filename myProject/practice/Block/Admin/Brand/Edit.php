<?php

namespace Block\Admin\Brand;

class Edit extends \Block\Core\Edit 
{
    public function __construct()
    {
        parent::__construct(); 
        $this->setTemplate('./View/Admin/Brand/update.php');
    }
}

?>