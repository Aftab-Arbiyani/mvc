<?php 

namespace Block\Admin\Customer;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $customers = [];
    
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Customer/grid.php');
    }

    public function setCustomers($customer = null)
    { 
        if(!$customer)
        {
            $customer = \Mage::getModel('Model\Customer');
            $query = "SELECT * FROM `customer` 
            JOIN `customer_group` 
                ON customer.groupId = customer_group.groupId 
            JOIN `customer_address` 
                ON customer.customerId = customer_address.customerId
                    WHERE customer_address.addressType = 'billing';";
            $customer = $customer->fetchAll($query);
        }
        $this->customers = $customer;
        return $this;
    }
    public function getCustomers()
    {
        if(!$this->customers)
        {
            $this->setCustomers();
        }
        return $this->customers;
    }
}
?>