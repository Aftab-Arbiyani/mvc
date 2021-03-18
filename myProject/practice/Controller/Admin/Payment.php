<?php

namespace Controller\Admin;
use Mage;
use Exception;

Mage::loadFileByClassName('Model\Payment');
Mage::loadFileByClassName('Controller\Core\Admin');

class Payment extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $this->renderLayout();
    }

    public function gridAction()
    {
        $grid = Mage::getBlock('Block\Admin\Payment\Grid')->toHtml();
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
            $payment = Mage::getModel('Model\Payment');
            if($id = (int)$this->getRequest()->getGet('id')){
                if(!$payment->load($id)){
                    throw new Exception("No data found");
                }
            }
            $formHtml = Mage::getBlock('Block\Admin\Payment\Edit')->setTableRow($payment)->toHtml();
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

            $payment = Mage::getModel('Model\Payment');

            if($id = (int)$this->getRequest()->getGet('id'))
            {
                $payment = $payment->load($id);
                if(!$payment)
                {
                    throw new Exception("No data found.");
                }
            }
            $paymentData = $this->getRequest()->getPost('payment');
            if(!$payment->createdDate)
            {
                $payment->createdDate = date('Y-m-d');
            }
            
            $payment->setData($paymentData);

            if(!$payment->save())
            {
                $this->getMessage()->setSuccess('Data saved successfully!!');
            }
            else
            {
                $this->getMessage()->setFailure('Unable to save data.');
            }

            $grid = Mage::getBlock('Block\Admin\Payment\Grid')->toHtml();

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

    public function deleteAction()
    {
        try{
            $id = (int)$this->getRequest()->getGet('id');

            if(!$id)
            {
                throw new Exception("Invalid Request.");
            }

            $payment = Mage::getModel('Model\Payment');
            
            if($payment->delete($id))
            {
                $this->getMessage()->setSuccess('Data deleted successfully');
            }
            else
            {
                $this->getMessage()->setFailure('Unable to delet data');
            } 

            $grid = Mage::getBlock('Block\Admin\Payment\Grid')->toHtml();

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
}
?>