<?php

namespace Block\Admin\Attribute\Edit;

class Tabs extends \Block\Core\Edit\Tabs
{
    public function prepareTab()
    {
        parent::prepareTab();
        $this->addTab('attribute', ['label' => 'Attribute Information', 'block' => 'Block\Admin\Attribute\Edit\Tabs\Form']);
        $this->addTab('option', ['label' => 'Attribute Options', 'block' => 'Block\Admin\Attribute\Edit\Tabs\Option']);
        $this->setDefaultTab('attribute');
        return $this;
    }
    public function getTabs()
    {
        if(!$this->getTableRow()->attributeId){
            $this->removeTab('option');

        }
        return $this->tabs;
    }
}

?>