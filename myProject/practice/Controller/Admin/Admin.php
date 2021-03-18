<?php

namespace Controller\Admin;
use Mage;
use Exception;

Mage::loadFileByClassName('Controller\Core\Admin');
Mage::loadFileByClassName('Model\Admin');

class Admin extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $this->renderLayout();
    }
    public function gridAction()
    {
        $grid = Mage::getBlock('Block\Admin\Admin\Grid')->toHtml();
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
            $admin = Mage::getModel('Model\Admin');
            if($id = (int)$this->getRequest()->getGet('id')){
                if(!$admin->load($id)){
                    throw new Exception("No data found");
                }
            }
            $formHtml = Mage::getBlock('Block\Admin\Admin\Edit')->setTableRow($admin)->toHtml();

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

    public function saveAction()
    {
        try{
            if(!$this->getRequest()->isPost()){
                throw new Exception("Invalid Request");
            }

            $admin = Mage::getModel('Model\Admin');
            if($id = (int)$this->getRequest()->getGet('id'))
            {
                $admin = $admin->load($id);

                if(!$admin)
                {
                    throw new Exception("No data found");
                }
            }
            
            $adminData = $this->getRequest()->getPost('admin');
            if(!$admin->createdDate)
            {
                $admin->createdDate = date('Y-m-d');
            }
            
            $admin->setData($adminData);

            if($admin->save())
            {
                $this->getMessage()->setSuccess('Data saved successfully!!');
            }
            else
            {
                $this->getMessage()->setFailure('Unable to save data.');
            }

            $grid = Mage::getBlock('Block\Admin\Admin\Grid')->toHtml();
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
            if(!$id){
                throw new Exception("Invalid Request.");
            }

            $admin = Mage::getModel('Model\Admin');
            
            if($admin->delete($id))
            {
                $this->getMessage()->setSuccess('Data deleted successfully');
            }
            else
            {
                $this->getMessage()->setFailure('Unable to delet data');
            }        
            $grid = Mage::getBlock('Block\Admin\Admin\Grid')->toHtml();

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