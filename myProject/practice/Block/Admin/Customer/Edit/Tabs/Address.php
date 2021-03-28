<?php 

namespace Block\Admin\Customer\Edit\Tabs;
use Mage; 

class Address extends \Block\Core\Edit 
{
    
    protected $address = null; 
    protected $shippingData = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Customer/Form/Tabs/address.php');
    }

    public function setAddress($address = null)
    {
        if($address)
        {
            $this->address = $address;
            return $this;
        }

        $customer = Mage::getModel('Model\Customer');
        $address = Mage::getModel('Model\Customer\Address');

        if($id = $this->getRequest()->getGet('id'))
        {
            $customer = $customer->load($id);
            $query = "SELECT * FROM `customer_address` WHERE `customerId` = '{$customer->customerId}' AND `AddressType` = 'billing'";
            $address = $address->fetchRow($query);
        }
        $this->address = $address;
        return $this;
    }

    public function getAddress()
    {
        if(!$this->address)
        {
            $this->setAddress();
        }
        return $this->address;
    }

    public function setBilling($shipping = null)
    {
        if($shipping)
        {
            $this->shippingData = $shipping;
            return $this;
        }

        $customer = Mage::getModel('Model\Customer');
        $address = Mage::getModel('Model\Customer\Address');

        if($id = $this->getRequest()->getGet('id'))
        {
            $customer = $customer->load($id);
            $query = "SELECT * FROM `customer_address` WHERE `customerId` = '{$customer->customerId}' AND `AddressType` = 'shipping'";
            $address = $address->fetchRow($query);
        }
        $this->shippingData = $address;
        return $this;

    }
    public function getBilling()
    {
        if (!$this->shippingData)
        {
            $this->setBilling();
        }
        return $this->shippingData;
    }
}

?>  