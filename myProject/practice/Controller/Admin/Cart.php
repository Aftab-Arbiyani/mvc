<?php

namespace Controller\Admin;
use Mage;
use Exception;

class Cart extends \Controller\Core\Admin 
{
    public function addToCartAction()
    {
        try {

            $id = (int)$this->getRequest()->getGet('id');
            $product = Mage::getModel('Model\Product')->load($id);

            if(!$product)
            {
                throw new Exception("No Product Found");
            }
            $cart = $this->getCart();
            $cart->addItemToCart($product, 1, true);
            $grid = Mage::getBlock('Block\Admin\Cart\Cart')->setCart($cart)->toHtml();
            
            $response=[
                'status' => 'success',
                'message' => 'jhba',
                'element' => [
                    'selector' => '#contentHtml',
                    'html' => $grid
                ]
            ];
            
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($response);
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }

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
    public function updateAction()
    {
        try {
            $quantities = $this->getRequest()->getPost('quantity');
            $cart = $this->getCart();

            foreach ($quantities as $cartItemId => $quantity) {
                $cartItem = Mage::getModel('Model\Cart\Item')->load($cartItemId);
                $cartItem->quantity = $quantity;
                $cartItem->save();
            }
            $this->getMessage()->setSuccess('Cart updated');

            $grid = Mage::getBlock('Block\Admin\Cart\Cart')->setCart($cart)->toHtml();
            
            $response=[
                'status' => 'success',
                'message' => 'jhba',
                'element' => [
                    'selector' => '#contentHtml',
                    'html' => $grid
                ]
            ];
            
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($response);
            
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function deleteAction()
    {
        try{
            $id = (int)$this->getRequest()->getGet('id');

            if(!$id){
                throw new Exception("Invalid Request.");
            }

            $cartItem = Mage::getModel('Model\Cart\Item');

            if($cartItem->delete($id))
            {
                $this->getMessage()->setSuccess('Data deleted successfully');
            } 

            $cart = $this->getCart();
            $grid = Mage::getBlock('Block\Admin\Cart\Cart')->setCart($cart)->toHtml();
            
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

        }catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function selectCustomerAction()
    {
        $customerId = $this->getRequest()->getPost('customer');
        $cart = $this->getCart($customerId['customerId']);
        $grid = Mage::getBlock('Block\Admin\Cart\Cart')->setCart($cart)->toHtml();
            
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
    // public function checkoutAction()
    // {
    //     $cart = $this->getCart();
    //     $grid = Mage::getBlock('Block\Admin\Cart\Checkout')->setCart($cart)->toHtml();
    //     $response = [
    //         'status' => 'success',
    //         'message' => 'vadsz',
    //         'element' => [
    //             'selector' => '#contentHtml',
    //             'html' => $grid
    //         ]
    //     ];
    //     header("Content-type: application/json; charset=utf-8");
    //     echo json_encode($response);
    // }
}


?>