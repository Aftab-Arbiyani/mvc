<?php

namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');

class Admin extends Core\Table{
    
    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;

    public function __construct(){
        parent::__construct();
        $this->setTableName('admin');
        $this->setPrimaryKey('adminId');
    }

    public function getStatusOptions(){
        return [
            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable'
        ]; 
    }
}

?>