<?php

namespace Block\Admin\Attribute;

\Mage::loadFileByClassName('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{
    public function prepareCollection()
    {
        $attribute = \Mage::getModel('Model\Attribute');
        $collection = $attribute->fetchAll();
        $this->setCollection($collection);
        return $this;
    }
    public function prepareColumns()
    {
        $this->addColumn('attributeId', ['field' => 'attributeId', 'label' => 'Id', 'type' => 'number']);
        $this->addColumn('name', ['field' => 'name', 'label' => 'Name', 'type' => 'text']);
        $this->addColumn('entityTypeId', ['field' => 'entityTypeId', 'label' => 'Entity Type', 'type' => 'text']);
        $this->addColumn('code', ['field' => 'code', 'label' => 'Code', 'type' => 'text']);
        $this->addColumn('code', ['field' => 'code', 'label' => 'Code', 'type' => 'text']);
        $this->addColumn('inputType', ['field' => 'inputType', 'label' => 'Input Type', 'type' => 'text']);
        $this->addColumn('backendType', ['field' => 'backendType', 'label' => 'Backend Type', 'type' => 'text']);
        return $this;
    }
    public function prepareActions()
    {
        $this->addAction('edit', ['label' => 'Edit', 'method' => 'getEditUrl', 'ajax' => true]);
        $this->addAction('delete', ['label' => 'Delete', 'method' => 'getDeleteUrl', 'ajax' => true]);
        return $this;
    }
    public function getEditUrl($row)
    {
        $url = $this->getUrl()->geturl('form', null, ['id' => $row->attributeId]);
        return "mage.setUrl('{$url}').resetParams().load()";
    }
    public function getDeleteUrl($row)
    {
        $url = $this->getUrl()->geturl('delete', null, ['id' => $row->attributeId]);
        return "mage.setUrl('{$url}').resetParams().load()";
    }
    public function prepareButtons()
    {
        $this->addButtons('addnew', ['label' => 'Add New', 'method' => 'getAddNewUrl', 'ajax' => true]);
        return $this;
    }
    public function getAddNewUrl()
    {
        $url = $this->getUrl()->geturl('form');
        return "mage.setUrl('{$url}').resetParams().load()";
    }
}

?>