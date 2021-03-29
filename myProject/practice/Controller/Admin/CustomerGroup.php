<?php

namespace Controller\Admin;
use Mage;
use Exception;

class CustomerGroup extends \Controller\Core\Admin 
{
    public function indexAction()
    {
        $this->renderLayout();
    }

    public function gridAction()
    {
        $grid = Mage::getBlock('Block\Admin\CustomerGroup\Grid')->toHtml();
        $this->makeResponse($grid);
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
            $this->makeResponse($formHtml);

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
            if ($id = (int)$this->getRequest()->getGet('id')){
                $customerGroup = $customerGroup->load($id);
                if(!$customerGroup){
                    throw new Exception("No data Found");
                }
            }
            $customerGroupData = $this->getRequest()->getPost('customerGroup');
            if(!$customerGroup->createdDate){
                $customerGroup->createdDate = date('Y-m-d');
            }

            $customerGroup->setData($customerGroupData);
            $customerGroup->save();
            $this->getMessage()->setSuccess('Data saved successfully!!');
            $grid = Mage::getBlock('Block\Admin\CustomerGroup\Grid')->toHtml();
            $this->makeResponse($grid);

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

            $customerGroup = Mage::getModel('Model\Customer\Group');  
            $customerGroup->delete($id);
            $this->getMessage()->setSuccess('Data deleted successfully');
            $grid = Mage::getBlock('Block\Admin\CustomerGroup\Grid')->toHtml();
            $this->makeResponse($grid);

        }catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
}

?>