<?php

namespace Block\Admin\Attribute;
use Mage;

class Edit extends \Block\Core\Edit
{
    public function __construct() 
    {
        parent::__construct();
        $this->setTabClass(Mage::getBlock('Block\Admin\Attribute\Edit\Tabs'));
    }
}

?>