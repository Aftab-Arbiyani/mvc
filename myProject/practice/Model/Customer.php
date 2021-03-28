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
    public function getBillingAddress()
    {
        $query = "SELECT * FROM `customer_address` WHERE `addressType`='billing' AND `customerId`='{$this->customerId}'";
        $address = \Mage::getModel('Model\Customer\Address')->fetchRow($query);
        if(!$address){
            return \Mage::getModel('Model\Customer\Address');
        }
        return $address;
    }
    public function getShippingAddress()
    {
        $query = "SELECT * FROM `customer_address` WHERE `addressType`='shipping' AND `customerId`='{$this->customerId}'";
        $address = \Mage::getModel('Model\Customer\Address')->fetchRow($query);
        if(!$address){
            return \Mage::getModel('Model\Customer\Address');
        }
        return $address;
    }
}
?> 