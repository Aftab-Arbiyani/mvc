<?php

namespace Controller\Admin;
use Mage;
use Exception;

Mage::loadFileByClassName('Model\Shipping');
Mage::loadFileByClassName('Controller\Core\Admin');


class Shipping extends \Controller\Core\Admin 
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $this->renderLayout();
    }

    public function gridAction()
    {
        $grid = Mage::getBlock('Block\Admin\Shipping\Grid')->toHtml();
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
            $shipping = Mage::getModel('Model\Shipping');
            if($id = (int)$this->getRequest()->getGet('id')){
                if(!$shipping->load($id)){
                    throw new Exception("No data found");
                }
            }
            $formHtml = Mage::getBlock('Block\Admin\Shipping\Edit')->setTableRow($shipping)->toHtml();

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

            $shipping = Mage::getModel('Model\Shipping');

            if($id = (int) $this->getRequest()->getGet('id'))
            {
                $shipping = $shipping->load($id);

                if(!$shipping)
                {
                    throw new Exception("No record found.");
                }
            }

            $shippingData = $this->getRequest()->getPost('shipping');

            if(!$shipping->createdDate)
            {
                $shipping->createdDate = date('Y-m-s');
            }

            $shipping->setData($shippingData);
            
            if(!$shipping->save())
            {
                $this->getMessage()->setSuccess('Data saved successfully!!');
            }
            else{
                $this->getMessage()->setFailure('Unable to save data.');
            }

            $grid = Mage::getBlock('Block\Admin\Shipping\Grid')->toHtml();
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

            $shipping = Mage::getModel('Model\Shipping');

            if($shipping->delete($id))
            {
                $this->getMessage()->setSuccess('Data deleted successfully');
            }
            else
            {
                $this->getMessage()->setFailure('Unable to delet data');
            } 

            $grid = Mage::getBlock('Block\Admin\Shipping\Grid')->toHtml();

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