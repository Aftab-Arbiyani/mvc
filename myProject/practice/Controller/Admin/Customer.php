<?php

namespace Controller\Admin;
use Mage;
use Exception;

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
        $this->makeResponse($grid);
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
            $this->makeResponse($formHtml);

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
                if(!$customer){
                    throw new Exception('No data found');
                }
                $customer->updatedDate = date('Y-m-d');
            }

            $customerData = $this->getRequest()->getPost('customer');
            if(!$customer->createdDate){
                $customer->createdDate = date('Y-m-d');
            }

            $customer->setData($customerData);
            $recordId = $customer->save();
            $this->getMessage()->setSuccess('Data saved successfully!!');
            $this->redirect('form', null, ['tab' => 'address', 'recordId' => $recordId]);

        }catch(Exception $e){
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

            $customer = Mage::getModel('Model\Customer');
            $customer->delete($id);
            $this->getMessage()->setSuccess('Data deleted successfully');
            $grid = Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
            $this->makeResponse($grid);

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
        $billingAddress->addressType = 'billing';

        $shippingAddress->customerId = $id;
        $shippingAddress->addressType = 'shipping';

        $billingAddress->save();
        $shippingAddress->save();

        $grid = Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
        $this->makeResponse($grid);
    }
}
?> 
