<?php

namespace Block\Admin\CustomerGroup;

class Grid extends \Block\Core\Grid
{
    public function prepareCollection()
    {
        $customerGroup = \Mage::getModel('Model\Customer\Group');
        $collection = $customerGroup->fetchAll();
        $this->setcollection($collection);
        return $this;
    }
    public function prepareColumns()
    {
        $this->addColumn('groupId', ['field' => 'groupId', 'label' => 'Id', 'type' => 'number']);
        $this->addColumn('name', ['field' => 'name', 'label' => 'Group Name', 'type' => 'text']);
        $this->addColumn('createdDate', ['field' => 'createdDate', 'label' => 'Created Date', 'type' => 'date']);
    }
    public function prepareActions()
    {
        $this->addAction('edit', ['label' => 'Edit', 'method' => 'getEditUrl', 'ajax' => true]);
        $this->addAction('delete', ['label' => 'Delete', 'method' => 'getDeleteUrl', 'ajax' => true]);
        return $this;
    }
    public function getEditUrl($row)
    {
        $url = $this->getUrl()->geturl('form', null, ['id' => $row->groupId]);
        return "mage.setUrl('{$url}').resetParams().load()";
    }
    public function getDeleteUrl($row)
    {
        $url = $this->getUrl()->geturl('delete', null, ['id' => $row->groupId]);
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