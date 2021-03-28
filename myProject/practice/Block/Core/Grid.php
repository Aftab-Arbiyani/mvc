<?php 

namespace Block\Core;

class Grid extends Template
{

    protected $columns = [];
    protected $actions = [];
    protected $collection = [];
    protected $buttons = [];
    protected $pager = null;
    protected $filter = null;
   
    public function __construct() 
    {
        parent::__construct();
        $this->setTemplate('./View/Core/grid.php');
        $this->prepareColumns();
        $this->prepareActions();
        $this->prepareButtons();
    }
    public function prepareCollection()
    {
        return $this;
    }
    public function setCollection($collection)
    {
        $this->collection = $collection;
        return $this;
    }
    public function getCollection()
    {
        if(!$this->collection){
            $this->prepareCollection();
        }
        return $this->collection;
    }
    public function getColumns()
    {
        return $this->columns;
    }
    public function addColumn($key, $column)
    {
        $this->columns[$key] = $column;
        return $this;
    }
    public function prepareColumns()
    {
        return $this;
    }
    public function getFieldValue($row, $field)
    {
        return $row->$field;
    }
    public function setActions($actions)
    {
        $this->actions = $actions;
        return $this;
    }
    public function getActions()
    {
        return $this->actions;
    }
    public function addAction($key, $value)
    {
        $this->actions[$key] = $value;
        return $this;
    }
    public function prepareActions()
    {
       return $this;
    }
    public function getMethodUrl($row, $methodName)
    {
        return $this->$methodName($row);
    }
    public function getButtons()
    {
        return $this->buttons;
    }
    public function addButtons($key, $value)
    {
        $this->buttons[$key] = $value;
        return $this;
    }
    public function prepareButtons()
    {
        return $this;
    }
    public function getButtonUrl($methodName)
    {
        return $this->$methodName();
    }
    public function getPager()
    {
        if(!$this->pager){
            $this->pager = \Mage::getController('Controller\Core\Pager');
        }
        return $this->pager;
    }
    public function getFilter()
    {
        if(!$this->filter){
            $this->filter = \Mage::getModel('Model\Admin\Filter');
        }
        return $this->filter;
    }
}
?>