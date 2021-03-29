<?php

namespace Controller\Admin;
use Mage;
use Exception;

class Checkout extends \Controller\Core\Admin
{
    public function checkoutAction()
    {
        $cart = $this->getCart();
        $grid = Mage::getBlock('Block\Admin\Cart\Checkout')->setCart($cart)->toHtml();
        $response = [
            'status' => 'success',
            'message' => 'vadsz',
            'element' => [
                'selector' => '#contentHtml',
                'html' => $grid
            ]
        ];
        header("Content-type: application/json; charset=utf-8");
        echo json_encode($response);
    }
    public function getCart($customerId = null)
    {
        $session = Mage::getModel('Model\Admin\Session');

        if($customerId){
            $session->customerId = $customerId;
        }
        $cart = Mage::getModel('Model\Cart');
        $query = "SELECT * FROM `cart` WHERE `customerId`='{$session->customerId}';";
        $cart = $cart->fetchRow($query);

        if ($cart) {
            return $cart;
        }
        $cart = Mage::getModel('Model\Cart');
        $cart->customerId = $session->customerId;
        $cart->createdDate = date('Y-m-d H:i:s');
        $cart->save();
        return $cart;
    }
    public function saveBillingAddressAction()
    {
        $cart = $this->getCart();
        $billingAddress = $this->getRequest()->getPost('billing');
        $addressId = $this->getRequest()->getPost('saveBilling');
        
        if($addressId){
            $address = Mage::getModel('Model\Customer\Address');
            $address->addressId = $addressId;
            $address->setData($billingAddress);
            $address->addressType = 'billing';
            $address->save();
        }
        else{
            $address = Mage::getModel('Model\Customer\Address');
            $address->setData($billingAddress);
            $address->customerId = $cart->customerId;
            $address->addressType = 'billing';
            $address->save();
        }
        $query = "SELECT * FROM `customer_address` WHERE `addressType`='billing' ORDER BY `addressId` DESC LIMIT 1;";
        $address1 = Mage::getModel('Model\Customer\Address')->fetchRow($query);
        $cartAddress = Mage::getModel('Model\Cart\Address');
        $cartAddress->cartId = $cart->cartId;
        $cartAddress->addressId = $address1->addressId;
        $cartAddress->addressType = $address1->addressType;
        $cartAddress->city = $address1->city;
        $cartAddress->state = $address1->state;
        $cartAddress->country = $address1->country;
        $cartAddress->zipcode = $address1->zipcode;
        $cartAddress->save();
    }
    public function saveShippingAddressAction()
    {
        $cart = $this->getCart();
        $shippingAddress = $this->getRequest()->getPost('shipping');
        $sameAsBilling = $this->getRequest()->getPost('sameAsBilling');
        $addressId = $this->getRequest()->getPost('saveShipping');

        if($sameAsBilling){
            $query = "SELECT * FROM `cart_address` WHERE `cartId`='{$cart->cartId}' AND `addressId`='{$sameAsBilling}'";
            $cartAddress = Mage::getModel('Model\Cart\Address')->fetchRow($query);
            $cartAddress->sameAsBilling = 1;
        }
        else{
            
            if($addressId){
                $address = Mage::getModel('Model\Customer\Address');
                $address->addressId = $addressId;
                $address->setData($shippingAddress);
                $address->addressType = 'shipping';
                $address->save();
            }
            else{
                $address = Mage::getModel('Model\Customer\Address');
                $address->setData($shippingAddress);
                $address->customerId = $cart->customerId;
                $address->addressType = 'shipping';
                $address->save();
            }
            $query = "SELECT * FROM `customer_address` WHERE `addressType`='shipping' ORDER BY `addressId` DESC LIMIT 1;";
            $address1 = Mage::getModel('Model\Customer\Address')->fetchRow($query);
            $cartAddress = Mage::getModel('Model\Cart\Address');
            $cartAddress->cartId = $cart->cartId;
            $cartAddress->addressId = $address1->addressId;
            $cartAddress->addressType = $address1->addressType;
            $cartAddress->city = $address1->city;
            $cartAddress->state = $address1->state;
            $cartAddress->country = $address1->country;
            $cartAddress->zipcode = $address1->zipcode;
            $cartAddress->save();
        }
    }
    public function savePaymentMethodAction()
    {
        $paymentMethod = $this->getRequest()->getPost('paymentMethod');
        if (array_key_exists('paymentMethodId', $paymentMethod)) {
            $cart = $this->getCart();
            $modelCart = Mage::getModel('Model\Cart')->load($cart->cartId);
            $modelCart->paymentMethodId = $paymentMethod['paymentMethodId'];
            $modelCart->save();
        }
        else{
            throw new Exception("Select a payment method.");
        }
    }
    public function saveShippingMethodAction()
    {
        $shippingMethod = $this->getRequest()->getPost('shippingMethod');
        if(array_key_exists('shippingMethodId', $shippingMethod)){
            $cart = $this->getCart();
            $modelCart = Mage::getModel('Model\Cart')->load($cart->cartId);
            $modelCart->shippingMethodId = $shippingMethod['shippingMethodId'];
            $modelShipping = Mage::getModel('Model\Shipping')->load($shippingMethod['shippingMethodId']);
            $modelCart->shippingAmount = $modelShipping->Amount;
            $modelCart->save();
            $modelCart->total = $this->getTotal();
            $modelCart->save();
        }
    }
    public function getTotal()
    {
        $cartItems = $this->getCart()->getItems();
        $total = 0;
        foreach ($cartItems->getData() as $key => $cartItem) {
            $total = $total + (($cartItem->price * $cartItem->quantity) - ($cartItem->discount * $cartItem->quantity));
        }
        return $total;
    }
}

?>