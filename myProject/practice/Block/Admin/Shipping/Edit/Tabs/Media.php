<?php 

namespace Block\Admin\Shipping\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Edit');

class Media extends \Block\Core\Edit
{ 
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Shipping/Form/Tabs/media.php'); 
    } 
}

?>