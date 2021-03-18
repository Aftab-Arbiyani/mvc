<?php

namespace Model\Core;

class Adapter{
    var $config = [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'project'
    ];

    var $connect = null;

    public function connection(){
        $connect = \mysqli_connect($this->config['host'], $this->config['username'], $this->config['password'], $this->config['database']);
        $this->setConnect($connect);
    }

    public function getConnect(){
        return $this->connect;
    }
    public function setConnect(\mysqli $connect){
        $this->connect = $connect;
        return $this;
    }
    public function isConnected(){
        if(!$this->getConnect()){
            return false;
        }
        return true;
    }
    public function select($query){
        if(!$this->isConnected()){
            $this->Connection();
        }
        $result=$this->getConnect()->query($query);
        return $result;
    }
    public function fetchRow($query)
    {
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);
        $row = $result->fetch_assoc();
        if (!$row) {
            return false;
        }
        return $row;
    }
    public function insert($query){
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);
        if($result){
            $result = $this->getConnect()->insert_id;
        }
        if($result)
        {
            return $this->getConnect()->insert_id;
        }
        return $result;
    }
    public function delete($query){
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);
        return $result;
    }
    public function update($query){
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);
        return $result;
    }
    public function fetchAll($query)
    {
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);
        $rows = $result->fetch_all($resultType = MYSQLI_ASSOC);;
        if (!$rows) {
            return false;
        }
        return $rows;
    }
    public function fetchPairs($query)
    {
        if(!$this->isConnected()){
            $this->connection();
        }
        $result = $this->getConnect()->query($query);
        $rows = $result->fetch_all();
        if (!$rows)
        {
            return $rows;
        }
        $columns = array_column($rows, '0');
        $values = array_column($rows, '1');
        return array_combine($columns, $values);
    }
}


?>