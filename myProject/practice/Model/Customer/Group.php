<?php 

namespace Model\Customer;

\Mage::loadFileByClassName('Model\Core\Table');


class Group extends \Model\Core\Table{

    const STATUS_ENABLED = 1;
    CONST STATUS_DISABLED = 0;

    public function __construct(){

        parent::__construct();
        $this->setTableName('customer_group');
        $this->setPrimaryKey('groupId');
    }
    
    public function getStatusOptions(){
        return [
            self::STATUS_DISABLED => "Disable",
            self::STATUS_ENABLED=> "Enable"
        ];
    }
}
?>  