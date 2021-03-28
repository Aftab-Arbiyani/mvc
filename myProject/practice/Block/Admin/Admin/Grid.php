<?php

namespace Block\Admin\Admin;

class Grid extends \Block\Core\Grid
{
    public function prepareCollection()
    {
        $admin = \Mage::getModel('Model\Admin');

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
            $query = "SELECT * FROM `admin` WHERE $sets";
            $count = $admin->getAdapter()->fetchOne($query);
            $collection = $admin->fetchAll($query);
            $this->setCollection($collection);
        }
        else
        {
            $query = "SELECT * FROM `admin`"; // LIMIT {$startFrom}, {$recordsPerPage}";
            $count = $admin->getAdapter()->fetchOne($query);

            $collection = $admin->fetchAll();
            $this->setCollection($collection);
        }
        $this->getPager()->setTotalRecords($count);
        $this->getPager()->calculatePage();

        return $this;
    }
    public function prepareColumns()
    {
        $this->addColumn('adminId', ['field' => 'adminId', 'label' => 'Id', 'type' => 'number']);
        $this->addColumn('userName', ['field' => 'userName', 'label' => 'Name', 'type' => 'text']);
        $this->addColumn('createdDate', ['field' => 'createdDate', 'label' => 'Created Date', 'type' => 'date']);
        return $this;
    }
    public function prepareButtons()
    {
        $this->addButtons('addnew', ['label' => 'Add New', 'method' => 'getAddNewUrl', 'ajax' => true]);
        return $this;
    }
    public function prepareActions()
    {
        $this->addAction('edit', ['label' => 'Edit', 'method' => 'getEditUrl', 'ajax' => true]);
        $this->addAction('delete', ['label' => 'Delete', 'method' => 'getDeleteUrl', 'ajax' => true]);
    }
    public function getEditUrl($row)
    {
        $url = $this->getUrl()->geturl('form', null, ['id' => $row->adminId]);
        return "mage.setUrl('{$url}').resetParams().load()";
    }
    public function getDeleteUrl($row)
    {
        $url = $this->getUrl()->geturl('delete', null, ['id' => $row->adminId]);
        return "mage.setUrl('{$url}').resetParams().load()";
    }
    public function getAddNewUrl()
    {
        $url = $this->getUrl()->geturl('form');
        return "mage.setUrl('{$url}').resetParams().load()";
    }
}

?>