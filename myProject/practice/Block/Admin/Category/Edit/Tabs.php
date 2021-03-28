<?php

namespace Block\Admin\Category\Edit;

class Tabs extends \Block\Core\Edit\Tabs
{
    public function prepareTab() 
    {
        parent::prepareTab();
        $this->addTab('category', ['label' => 'Category Information', 'block' => 'Block\Admin\Category\Edit\Tabs\Form']);
        $this->addTab('media', ['label' => 'Media', 'block' => 'Block\Admin\Category\Edit\Tabs\Media']);
        $this->setDefaultTab('category');
        return $this;
    }
    public function getTabs()
    {
        if(!$this->getTableRow()->categoryId){
            $this->removeTab('media');
        }
        return $this->tabs;
    }
}

?>