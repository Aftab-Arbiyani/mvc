<?php

namespace Block\Admin\Category;

class Grid extends \Block\Core\Grid
{
    protected $categoryOptions = [];

    public function prepareCollection() 
    { 
        $category = \Mage::getModel('Model\Category');
        $collection = $category->fetchAll();
        $this->setCollection($collection);
        return $this;
    }
    public function prepareColumns()
    {
        $this->addColumn('categoryId', ['field' => 'categoryId', 'label' => 'id', 'type' => 'number']);
        $this->addColumn('name', ['field' => 'name', 'label' => 'Name', 'type' => 'text']);
        $this->addColumn('description', ['field' => 'description', 'label' => 'Description', 'type' => 'text']);
        return $this;
    }
    public function prepareActions()
    {
        $this->addAction('edit', ['label' => 'Edit', 'method' => 'getEditUrl', 'ajax' => true]);
        $this->addAction('delete', ['label' => 'Delete', 'method' => 'getDeleteUrl', 'ajax' => true]);
        return $this;
    }
    public function prepareButtons()
    {
        $this->addButtons('addnew', ['label' => 'Add New', 'method' => 'getAddNewUrl', 'ajax' => true]);
        return $this;
    }
    public function getEditUrl($row)
    {
        $url = $this->getUrl()->geturl('form', null, ['id' => $row->categoryId]);
        return "mage.setUrl('{$url}').resetParams().load()";
    }
    public function getDeleteUrl($row)
    {
        $url = $this->getUrl()->geturl('delete', null, ['id' => $row->categoryId]);
        return "mage.setUrl('{$url}').resetParams().load()";
    }
    public function getAddNewUrl()
    {
        $url = $this->getUrl()->geturl('form');
        return "mage.setUrl('{$url}').resetParams().load()";
    }
    public function getName($category)
    {
        $modelCategory = \Mage::getModel('Model\Category');

        if(!$this->categoryOptions){
            $query = "SELECT `categoryId`, `name` FROM `{$modelCategory->getTableName()}`;";
            $this->categoryOptions = $modelCategory->getAdapter()->fetchPairs($query);
        }

        $pathIds = explode("=", $category->pathId);
        foreach ($pathIds as $key => &$id) {
            if(array_key_exists($id, $this->categoryOptions)){
                $id = $this->categoryOptions[$id];
            }
        }
        $name = implode('=>', $pathIds);
        return $name;
    }
    public function getFieldValue($row, $field)
    {
        if($field == 'name'){
            return $this->getName($row);
        }
        return $row->$field;
    }
}
?>
