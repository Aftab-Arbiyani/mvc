<?php

namespace Controller\Admin;
use Mage;
use Exception;

Mage::loadFileByClassName('Model\Customer');
Mage::loadFileByClassName('Controller\Core\Admin'); 

class Customer extends \Controller\Core\Admin
{
    public function indexAction()
    { 
        $layout = $this->getLayout();
        $this->renderLayout();
    }

    public function gridAction()
    {
        $grid = Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();

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
    public function formAction()
    {
        try {
            $customer = Mage::getModel('Model\Customer');
            if($id = (int)$this->getRequest()->getGet('id')){
                if(!$customer->load($id)){
                    throw new Exception("No data found");
                }
            }
            $formHtml = Mage::getBlock('Block\Admin\Customer\Edit')->setTableRow($customer)->toHtml();

            $response = [
                'status' => 'success',
                'message' => 'excellent',
                'element' =>[
                    'selector' => '#contentHtml',
                    'html' => $formHtml
                ]
            ];

            header("Content-type: application/json; charset=utf-8");
            echo json_encode($response);
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    function saveAction()
    {
        try{
            if(!$this->getRequest()->isPost())
            {
                throw new Exception("Invalid Request.");
            }

            $customer = Mage::getModel('Model\Customer');

            if($id = (int)$this->getRequest()->getGet('id'))
            {
                $customer = $customer->load($id);

                if(!$customer)
                {
                    throw new Exception('No data found');
                }

                $customer->updatedDate = date('Y-m-d');
            }

            $customerData = $this->getRequest()->getPost('customer');
            if(!$customer->createdDate)
            {
                $customer->createdDate = date('Y-m-d');
            }
            $customer->setData($customerData);
            $recordId = $customer->save();
    
            if($recordId)
            {
                $this->getMessage()->setSuccess('Data saved successfully!!');
            }
            else
            {
                $this->getMessage()->setFailure('Unable to save data.');
            }
            $this->redirect('form', null, ['tab' => 'address', 'recordId' => $recordId]);
        }catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    
    public function deleteAction()
    {
        try{
            $id = (int)$this->getRequest()->getGet('id');

            if(!$id)
            {
                throw new Exception("Invalid Request.");
            }

            $customer = Mage::getModel('Model\Customer');
            
            if($customer->delete($id))
            {
                $this->getMessage()->setSuccess('Data deleted successfully');
            }
            else
            {
                $this->getMessage()->setFailure('Unable to delet data');
            } 

            $grid = Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
            
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

    public function addressAction()
    {
        $id = $this->getRequest()->getGet('recordId');

        $shippingData = $this->getRequest()->getPost('shipping');
        $billingData = $this->getRequest()->getPost('billing');

        $billingAddress = Mage::getModel('Model\Customer\Address');
        $shippingAddress = Mage::getModel('Model\Customer\Address');

        $billingAddress->setData($shippingData);
        $shippingAddress->setData($billingData);

        $billingAddress->customerId = $id;
        $billingAddress->AddressType = 'billing';

        $shippingAddress->customerId = $id;
        $shippingAddress->AddressType = 'shipping';

        $billingAddress->save();
        $shippingAddress->save();

        $grid = Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
        
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
}
?> 
