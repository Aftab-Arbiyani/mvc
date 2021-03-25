<?php 

namespace Block\Admin\Product;

\Mage::loadFileByClassName('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{
    public function prepareCollection()
    {
        $product = \Mage::getModel('Model\Product');
        $filterData = $this->getRequest()->getPost('filter');
        print_r($filterData);
        $collection = $product->fetchAll();
        $this->setCollection($collection);
        return $this;
    }
    public function prepareColumns()
    {
        $this->addColumn('productId', ['field' => 'productId', 'label' => 'Product Id', 'type' => 'number']);
        $this->addColumn('name', ['field' => 'name', 'label' => 'Name', 'type' => 'text']);
        $this->addColumn('price', ['field' => 'price', 'label' => 'Price', 'type' => 'decimal']);
        $this->addColumn('quantity', ['field' => 'quantity', 'label' => 'Quantity', 'type' => 'number']);   
        $this->addColumn('sku', ['field' => 'sku', 'label' => 'Sku', 'type' => 'text']);   
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
        $url = $this->getUrl()->geturl('form', null, ['id' => $row->productId]);
        return "mage.setUrl('{$url}').resetParams().load()";
    }
    public function getDeleteUrl($row)
    {
        $url = $this->getUrl()->geturl('delete', null, ['id' => $row->productId]);
        return "mage.setUrl('{$url}').resetParams().load()";
    }
    public function prepareButtons()
    {
        $this->addButtons('addnew', ['label' => 'Add New', 'method' => 'getAddNewUrl', 'ajax' => true]);
        $this->addButtons('applyfilter', ['label' => 'Apply Filter', 'method' => 'getApplyFilter', 'ajax' => true]);
        return $this;
    }
    public function getAddNewUrl()
    {
        $url = $this->getUrl()->geturl('form');
        return "mage.setUrl('{$url}').resetParams().load()";
    }
    public function getApplyFilter()
    {
        // $url = $this->getUrl()->geturl('filter');
        return "mage.setForm(this).load()";
    }
}
?>