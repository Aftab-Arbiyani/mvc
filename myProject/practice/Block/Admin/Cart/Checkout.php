<?php

namespace Block\Admin\Cart;
use Mage;

class Checkout extends \Block\Core\Template
{
    protected $cart = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Cart/checkout.php');
    }
    public function setCart(\Model\Cart $cart)
    {
       
        $this->cart = $cart;
        
        return $this;
    }
    public function getCart()
    {
        if(!$this->cart){
            throw new \Exception("No cart found.");
        }
        return $this->cart;
    }
    public function getCustomers()
    {
        $query = "SELECT `customerId`, `firstName` FROM `customer`";

        return $customers = Mage::getModel('Model\Customer')->getAdapter()->fetchPairs($query);
    }
    public function getBillingAddress()
    {
        $cartBillingAddress = $this->getCart()->getBillingAddress();
        

        if($cartBillingAddress){
            return $cartBillingAddress;
        }
        $billingAddress = $this->getCart()->getCustomer()->getBillingAddress();
        return $billingAddress;
    }
    public function getShippingAddress()
    {
        $cartShippingAddress = $this->getCart()->getShippingAddress();

        if($cartShippingAddress){
            return $cartShippingAddress;
        }
        $shippingAddress = $this->getCart()->getCustomer()->getShippingAddress();
        return $shippingAddress;
    }
    public function getPaymentMethods()
    {
        $paymetMethods = Mage::getModel('Model\Payment');
        $query = "SELECT `methodId`, `Name` FROM `payment`";
        $paymetMethods = $paymetMethods->getAdapter()->fetchPairs($query);
        return $paymetMethods;
    }
    public function getShippingMethods()
    {
        $shippingMethods = Mage::getModel('Model\Shipping');
        $shippingMethods = $shippingMethods->fetchAll();
        return $shippingMethods;
    }
}

?>