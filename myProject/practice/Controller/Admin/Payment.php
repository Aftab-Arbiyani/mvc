<?php

namespace Controller\Admin;
use Mage;
use Exception;

class Payment extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $this->renderLayout();
    }

    public function gridAction()
    {
        $grid = Mage::getBlock('Block\Admin\Payment\Grid')->toHtml();
        $this->makeResponse($grid);
    }
    public function formAction()
    {
        try {
            $payment = Mage::getModel('Model\Payment');
            if($id = (int)$this->getRequest()->getGet('id')){
                if(!$payment->load($id)){
                    throw new Exception("No data found");
                }
            }
            $formHtml = Mage::getBlock('Block\Admin\Payment\Edit')->setTableRow($payment)->toHtml();
            $this->makeResponse($formHtml);

        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    function saveAction()
    {
        try{
            if(!$this->getRequest()->isPost()){
                throw new Exception("Invalid Request.");
            }

            $payment = Mage::getModel('Model\Payment');
            if($id = (int)$this->getRequest()->getGet('id')){
                $payment = $payment->load($id);
                if(!$payment){
                    throw new Exception("No data found.");
                }
            }
            $paymentData = $this->getRequest()->getPost('payment');
            if(!$payment->createdDate){
                $payment->createdDate = date('Y-m-d');
            }
            
            $payment->setData($paymentData);
            $payment->save();
            $this->getMessage()->setSuccess('Data saved successfully!!');
            $grid = Mage::getBlock('Block\Admin\Payment\Grid')->toHtml();
            $this->makeResponse($grid);

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

            $payment = Mage::getModel('Model\Payment');
            $payment->delete($id);
            $this->getMessage()->setSuccess('Data deleted successfully');
            $grid = Mage::getBlock('Block\Admin\Payment\Grid')->toHtml();
            $this->makeResponse($grid);
            
        }catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
}
?>