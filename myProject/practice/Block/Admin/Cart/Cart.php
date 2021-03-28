<?php

namespace Block\Admin\Cart;

use Mage;

class Cart extends \Block\Core\Template
{
    protected $cart = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Cart/cart.php');
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
}

?>