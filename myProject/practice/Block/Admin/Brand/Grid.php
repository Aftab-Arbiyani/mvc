<?php

namespace Block\Admin\Brand;

class Grid extends \Block\Core\Grid
{
    public function prepareCollection()
    {
        $brand = \Mage::getModel('Model\Brand');
        $collection = $brand->fetchAll();
        $this->setCollection($collection);
        return $this;
    }
    public function prepareColumns()
    {
        $this->addColumn('brandId', ['field' => 'brandId', 'label' => 'Id', 'type' => 'number']);
        $this->addColumn('name', ['field' => 'name', 'label' => 'Name', 'type' => 'text']);
        $this->addColumn('image', ['field' => 'image', 'label' => 'image', 'type' => 'text']);
        $this->addColumn('createdDate', ['field' => 'createdDate', 'label' => 'Created Date', 'type' => 'date']);
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
        $url = $this->getUrl()->geturl('form', null, ['id' => $row->brandId]);
        return "mage.setUrl('{$url}').resetParams().load()";
    }
    public function getDeleteUrl($row)
    {
        $url = $this->getUrl()->geturl('delete', null, ['id' => $row->brandId]);
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
    public function getFieldValue($row, $field)
    {
        if($field == 'image'){
            return "\myProject\practice\Image\\".$row->$field;
        }
        return $row->$field;
    }
}

?>