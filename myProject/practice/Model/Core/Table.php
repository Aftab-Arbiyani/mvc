<?php

namespace Model\Core;

\Mage::loadFileByClassName('Model\Core\Adapter');

class Table{

    protected $adapter = null;
    protected $primaryKey = null;
    protected $tableName = null;
    protected $data = [];

    function __construct(){
        $this->setAdapter();
    }

    public function setAdapter(){
        $this->adapter = \Mage::getController('Model\Core\Adapter');
        return $this;
    }
    public function getAdapter(){
        if(!$this->adapter){
            $this->setAdapter();
        }
        return $this->adapter;
    }
    public function getPrimaryKey(){
        return $this->primaryKey;
    }
    public function setPrimaryKey($primaryKey){
        $this->primaryKey = $primaryKey;
        return $this;
    }
    public function getTableName(){
        return $this->tableName;
    }
    public function setTableName($tableName){
        $this->tableName = $tableName;
        return $this;
    }
    public function setData(array $data){
        $this->data = array_merge($this->data, $data);
        return $this;
    }
    public function getData(){
        return $this->data;
    }
    public function __set($name, $value){
        $this->data[$name] = $value;
        return $this;
    }
    public function __get($name)
    {
        if(!array_key_exists($name, $this->data)){
            return null;
        }
        return $this->data[$name];
    }
    public function load($value){
        $value = (int)$value;
        $query = "SELECT * FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}`='{$value}'";
        return $this->fetchRow($query);
    }
    public function fetchRow($query){
        $row = $this->getAdapter()->fetchRow($query);
        if(!$row){
            return false;
        }
        $this->data = $row;
        return $this;
    }
    public function unsetData()
    {
        $this->data = [];
        return $this;
    }

    public function fetchAll($query = null)
    {
        if (!$query) {
            $query = "SELECT * FROM `{$this->getTableName()}`";
        }
        $rows = $this->getAdapter()->fetchAll($query);
        if (!$rows) {
            $this->unsetData();
            return false;
        }
        foreach ($rows as $key => &$value) {
            $row =  new $this;
            $value = $row->setData($value);
        }

        $collectionClassName = get_class($this) . '\Collection';
        $collection = \Mage::getController($collectionClassName);
        $collection->setData($rows);
        unset($rows);
        return $collection;
    }
    public function save(){

        $productData = $this->getData();
        
        if(!array_key_exists($this->getPrimaryKey(), $this->getData())){
            $columns = implode(",", array_keys($productData));
            $values = "'" . implode("','", array_values($productData)) . "'";
            $query = 'INSERT INTO `' . $this->getTableName() . '` (' . $columns . ') VALUES (' . $values . ')';
            // echo $query; die();
            $this->getAdapter()->connection();
            $recordId = $this->getAdapter()->insert($query);    
            $this->load($recordId);
            return $recordId;
        }
        else{
            $sets = "";
            foreach ($this->getData() as $k => $v) {
                $sets = $sets . $k . "='" . $v . "',";
            }
            $sets = rtrim($sets, ",");
            $query = "UPDATE `{$this->getTableName()}` SET {$sets} WHERE `{$this->getPrimaryKey()}`='{$this->data[$this->getPrimaryKey()]}'";
            // echo $query; die();

            $recordId = $this->getAdapter()->update($query);
        }

    }
    public function delete($value){
        $value = (int)$value;
        $query = "DELETE FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}`='{$value}'";
        // echo $query; die();
        $this->getAdapter()->delete($query);
    }
}
?>