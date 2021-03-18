<?php

namespace Block\Admin\Admin;
use Mage;

Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabClass(Mage::getBlock('Block\Admin\Admin\Edit\Tabs'));
    }
}
?>