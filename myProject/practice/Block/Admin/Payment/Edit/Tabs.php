<?php

namespace Block\Admin\Payment\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');
 
class Tabs extends \Block\Core\Edit\Tabs
{
    public function prepareTab() 
    {
        parent::prepareTab();
        $this->addTab('payment', ['label' => 'Payment Information', 'block' => 'Block\Admin\Payment\Edit\Tabs\Form']);
        $this->addTab('media', ['label' => 'Media', 'block' => 'Block\Admin\Payment\Edit\Tabs\Media']);
        $this->setDefaultTab('payment');
        return $this;
    }
    public function getTabs()
    {
        if(!$this->getTableRow()->methodId){
            $this->removeTab('media');

        }
        return $this->tabs;
    }
    
}


?>