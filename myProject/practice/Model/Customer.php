<?php 

namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');


class Customer extends Core\Table{

    const STATUS_ENABLED = 'Enable';
    const STATUS_DISABLED = 'Disable';

    public function __construct(){

        parent::__construct();
        $this->setTableName('customer');
        $this->setPrimaryKey('customerId');
    }
    
    public function getStatusOptions(){
        return [
            self::STATUS_DISABLED => "Disable",
            self::STATUS_ENABLED=> "Enable"
        ];
    }
}
?> 