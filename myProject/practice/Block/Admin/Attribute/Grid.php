<?php

namespace Block\Admin\Attribute;

class Grid extends \Block\Core\Grid
{
    public function prepareCollection()
    {
        $attribute = \Mage::getModel('Model\Attribute');

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
            $query = "SELECT * FROM `attribute` WHERE $sets";
            $count = $attribute->getAdapter()->fetchOne($query);
            $collection = $attribute->fetchAll($query);
            $this->setCollection($collection);
        }
        else
        {
            $query = "SELECT * FROM `attribute`"; // LIMIT {$startFrom}, {$recordsPerPage}";
            $count = $attribute->getAdapter()->fetchOne($query);

            $collection = $attribute->fetchAll($query);
            $this->setCollection($collection);
        }

        $this->getPager()->setTotalRecords($count); 
        
        $this->getPager()->calculatePage();

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