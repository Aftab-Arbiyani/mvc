<?php 

namespace Block\Admin\Admin\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Edit');

class Media extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct(); 
        $this->setTemplate('./View/Admin\Admin/Form/Tabs/media.php');
    } 
}

?>