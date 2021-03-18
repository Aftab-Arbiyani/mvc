<?php

namespace Controller\Admin;
use Mage;
use Exception;

Mage::loadFileByClassName('Model\Customer\Group');
Mage::loadFileByClassName('Controller\Core\Admin');

class CustomerGroup extends \Controller\Core\Admin 
{
    public function indexAction()
    {
        $this->renderLayout();
    }

    public function gridAction()
    {
        $grid = Mage::getBlock('Block\Admin\CustomerGroup\Grid')->toHtml();
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
            $customerGroup = Mage::getModel('Model\Customer\Group');
            if($id = (int)$this->getRequest()->getGet('id')){
                if(!$customerGroup->load($id)){
                    throw new Exception("No data found");
                }
            }
            $formHtml = Mage::getBlock('Block\Admin\CustomerGroup\Edit')->setTableRow($customerGroup)->toHtml();

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
        }catch (Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function saveAction()
    {
        try {
            if(!$this->getRequest()->isPost()){
                throw new Exception("Invalid Request");
            }
            $customerGroup = Mage::getModel('Model\Customer\Group');
            if ($id = (int)$this->getRequest()->getGet('id'))
            {
                $customerGroup = $customerGroup->load($id);
                if(!$customerGroup)
                {
                    throw new Exception("No data Found");
                }
            }
            $customerGroupData = $this->getRequest()->getPost('customerGroup');

            if(!$customerGroup->createdDate){
                $customerGroup->createdDate = date('Y-m-d');
            }

            $customerGroup->setData($customerGroupData);
            
            if(!$customerGroup->save()){
                $this->getMessage()->setSuccess('Data saved successfully!!');
            }
            else {
                $this->getMessage()->setFailure('Unable to save data.');
            }
            $grid = Mage::getBlock('Block\Admin\CustomerGroup\Grid')->toHtml();
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
        } catch (Exception $e) {
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

            $customerGroup = Mage::getModel('Model\Customer\Group');
            
            if($customerGroup->delete($id))
            {
                $this->getMessage()->setSuccess('Data deleted successfully');
            }
            else
            {
                $this->getMessage()->setFailure('Unable to delet data');
            } 
            $grid = Mage::getBlock('Block\Admin\CustomerGroup\Grid')->toHtml();

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