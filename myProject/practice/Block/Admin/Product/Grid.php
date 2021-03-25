<?php 

namespace Block\Admin\Product;

\Mage::loadFileByClassName('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{
    public function prepareCollection()
    {
        $product = \Mage::getModel('Model\Product');

        if (array_key_exists('p', $_GET)) {
            $this->getPager()->setCurrentPage($_GET['p']);
        }
        $this->getPager()->setRecordsPerPage(2);

        $recordsPerPage = $this->getPager()->getRecordsPerPage();
        $page = $this->getPager()->getCurrentPage();
        $startFrom = ($page - 1) * $recordsPerPage;

        if($this->getFilter()->hasFilters())
        {
            $sets = "";
            foreach ($this->getFilter()->getFilters() as $type => $filters)
            {
                
                foreach ($filters as $key => $value)
                {
                    $sets = $sets . $key . "='" . $value . "' AND ";
                }
            }
            $sets = rtrim($sets, " AND ");
            $query = "SELECT * FROM `product` WHERE $sets";
            $count = $product->getAdapter()->fetchOne($query);
            $collection = $product->fetchAll($query);
            $this->setCollection($collection);
        }
        else
        {
            $query = "SELECT * FROM `product`"; // LIMIT {$startFrom}, {$recordsPerPage}";
            $count = $product->getAdapter()->fetchOne($query);

            $collection = $product->fetchAll();
            $this->setCollection($collection);
        }

        $this->getPager()->setTotalRecords($count); 
        
        $this->getPager()->calculatePage();

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
        $url = $this->getUrl()->geturl('filter');
        return "mage.setForm(this).setUrl('{$url}').load()";
    }
}
?>