<?php

namespace Block\Admin\Payment;

\Mage::loadFileByClassName('Block\Core\Grid');
    
class Grid extends \Block\Core\Grid
{
    public function prepareCollection($payment = null)
    {
        $payment = \Mage::getModel('Model\Payment'); 
        $collection = $payment->fetchAll();
        $this->setCollection($collection);
        return $this;
    }
    public function prepareColumns()
    {
        $this->addColumn('methodId', ['field' => 'methodId', 'label' => 'Id', 'type' => 'number']);
        $this->addColumn('Name', ['field' => 'Name', 'label' => 'Name', 'type' => 'text']);
        $this->addColumn('Code', ['field' => 'Code', 'label' => 'Code', 'type' => 'text']);
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
        $url = $this->getUrl()->geturl('form', null, ['id' => $row->methodId]);
        return "mage.setUrl('{$url}').resetParams().load()";
    }
    public function getDeleteUrl($row)
    {
        $url = $this->getUrl()->geturl('delete', null, ['id' => $row->methodId]);
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