<?php

namespace Block\Admin\Shipping\Edit;

class Tabs extends \Block\Core\Edit\Tabs
{
    public function prepareTab() 
    {
        parent::prepareTab();
        $this->addTab('shipping', ['label' => 'Shipping', 'block' =>'Block\Admin\Shipping\Edit\Tabs\Form']); 
        $this->addTab('media', ['label' => 'Media', 'block' =>'Block\Admin\Shipping\Edit\Tabs\Media']);
        $this->setDefaultTab('shipping');
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