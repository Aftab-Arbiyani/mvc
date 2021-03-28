<?php

namespace Model;

class Cart extends Core\Table
{
    protected $customer = null;
    protected $items = null;
    protected $billingAddress = null;
    protected $shippingAddress = null;
    protected $paymentMethod = null;
    protected $shippingMethod = null;

    public function __construct()
    {
        $this->setTableName('cart');
        $this->setPrimaryKey('cartId');
    }
    public function setCustomer(\Model\Customer $customer)
    {
        $this->customer = $customer;
        return $this;
    }
    public function getCustomer()
    {
        if ($this->customer) {
            return $this->customer;
        }
        if (!$this->customerId) {
            return false;
        }
        $customer = \Mage::getModel('Model\Customer')->load($this->customerId);
        $this->setCustomer($customer);
        return $this->customer;
    }
    public function setItems(\Model\Cart\Item\Collection $items)
    {
        $this->items = $items;
        return $items;
    }
    public function getItems()
    {
        if(!$this->cartId){
            return false;
        }
        $query = "SELECT * FROM `cart_item` WHERE `cartId`='{$this->cartId}';";
        $items = \Mage::getModel('Model\Cart\Item')->fetchAll($query);
        if($items){
            $this->setItems($items);
        }
        return $this->items;
    }
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }
    public function getBillingAddress()
    {
        if(!$this->cartId){
            return false;
        }
        $query = "SELECT * FROM `cart_address` WHERE `cartId` = '{$this->cartId}' AND `addressType`='billing';";
        $billingAddress = \Mage::getModel('Model\Cart\Address')->fetchRow($query);
        $this->setBillingAddress($billingAddress);
        
        if(!$this->billingAddress){
            return \Mage::getModel('Model\Customer\Address');
        }
       
        return $this->billingAddress;
    }
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }
    public function getShippingAddress()
    {
        if(!$this->cartId){
            return false;
        }
        $query = "SELECT * FROM `cart_address` WHERE `cartId` = '{$this->cartId}' AND `addressType`='shipping';";
        $shippingAddress = \Mage::getModel('Model\Cart\Address')->fetchRow($query);
        $this->setBillingAddress($shippingAddress);
        if(!$this->shippingAddress){
            return \Mage::getModel('Model\Customer\Address');
        }
        return $this->shippingAddress;
    }
    public function setPaymentMethod(\Model\Payment $payment)
    {
        $this->paymentMethod = $payment;
        return $this;
    }

    public function getPaymentMethod()
    {
        if (!$this->methodId) {
            return false;
        }
        $payment = \Mage::getModel('Model\Payment')->load($this->methodId);
        $this->setPaymentMethod($payment);
        return $this->paymentMethod;
    }

    public function setShippingMethod(\Model\Shipping $shipping)
    {
        $this->shippingMethod = $shipping;
        return $this;
    }

    public function getShippingMethod()
    {
        if (!$this->methodId) {
            return false;
        }
        $shipping = \Mage::getModel('Model\shipping')->load($this->methodId);
        $this->setShippingMethod($shipping);
        return $this->shippingMethod;
    }
    public function addItemToCart($product, $quantity = 1, $addMode = false)
    {
        $query = "SELECT * FROM `cart_item` WHERE `cartId`='{$this->cartId}' AND `productId`='{$product->productId}' ";

        $cartItem = \Mage::getModel('Model\Cart\Item');
        $cartItem = $cartItem->fetchRow($query);

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save(); 
            return true;
        }

        $cartItem = \Mage::getModel('Model\Cart\Item');
        $cartItem->cartId = $this->cartId;
        $cartItem->productId = $product->productId;
        $cartItem->price = $product->price;
        $cartItem->quantity = $quantity;
        $cartItem->discount = $product->discount;
        $cartItem->createdDate = date('Y-m-d H:i:s');
        $cartItem->save(); 
        return true;
    }
}

?>