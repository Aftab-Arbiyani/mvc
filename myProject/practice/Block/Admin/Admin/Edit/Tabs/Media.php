<?php 

namespace Block\Admin\Admin\Edit\Tabs;

class Media extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct(); 
        $this->setTemplate('./View/Admin\Admin/Form/Tabs/media.php');
    } 
}

?>