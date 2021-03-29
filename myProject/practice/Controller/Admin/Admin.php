<?php

namespace Controller\Admin;
use Mage;
use Exception;

class Admin extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $this->renderLayout();
    }
    public function gridAction()
    {
        $grid = Mage::getBlock('Block\Admin\Admin\Grid')->toHtml();
        $this->makeResponse($grid);
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
            $this->makeResponse($formHtml);

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

            $admin->save();
            $this->getMessage()->setSuccess('Data saved successfully!!');          

            $grid = Mage::getBlock('Block\Admin\Admin\Grid')->toHtml();

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

            $admin = Mage::getModel('Model\Admin');
            $admin->delete($id);
            $this->getMessage()->setSuccess('Data deleted successfully');
                  
            $grid = Mage::getBlock('Block\Admin\Admin\Grid')->toHtml();
            $this->makeResponse($grid);

        }catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
}


?>