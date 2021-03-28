<?php

namespace Block\Admin\Layout;

class Footer extends \Block\Core\Template
{

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Layout/footer.php');   
    }
}
?>