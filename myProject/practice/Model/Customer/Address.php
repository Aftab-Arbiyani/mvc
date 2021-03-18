<?php

namespace Model\Customer;

\Mage::loadFileByClassName('Model\Core\Table');

class Address extends \Model\Core\Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('customer_address');
        $this->setPrimaryKey('addressId');
    }
}

?>