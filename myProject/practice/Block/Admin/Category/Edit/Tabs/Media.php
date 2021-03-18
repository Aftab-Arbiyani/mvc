<?php 

namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Edit');

class Media extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();  
        $this->setTemplate('./View/Admin/Category/Form/Tabs/media.php');
    }
}

?> 