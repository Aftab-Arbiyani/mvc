<?php

namespace Block\Admin\Customer\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
    public function prepareTab()
    {
        parent::prepareTab();
        $this->addTab('customer', ['label' => 'Customer Information', 'block' =>'Block\Admin\Customer\Edit\Tabs\Form']);
        $this->addTab('address', ['label' => 'Customer Address', 'block' =>'Block\Admin\Customer\Edit\Tabs\Address']);
        $this->setDefaultTab('customer');
        return $this;
    }
}


?>