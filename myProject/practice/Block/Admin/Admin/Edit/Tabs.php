<?php

namespace Block\Admin\Admin\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
    public function prepareTab()
    {
        parent::prepareTab();
        $this->addTab('admin', ['label' => 'Admin Information', 'block' => 'Block\Admin\Admin\Edit\Tabs\Form']);
        $this->addTab('media', ['label' => 'Media', 'block' => 'Block\Admin\Admin\Edit\Tabs\Media']);
        $this->setDefaultTab('admin');
        return $this;
    }
    public function getTabs()
    {
        if(!$this->getTableRow()->adminId){
            $this->removeTab('media');

        }
        return $this->tabs;
    }
}
?>