<?php

namespace Controller\Admin;
use Mage;
use Exception;

class Brand extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $this->renderLayout();
    }
    public function gridAction()
    {
        $grid = Mage::getBlock('Block\Admin\Brand\Grid')->toHtml();
        $this->makeResponse($grid);
    }
    public function formAction()
    {
        try {
            $brand = Mage::getModel('Model\Brand');
            if($id = (int)$this->getRequest()->getGet('id')){
                if(!$brand->load($id)){
                    throw new Exception("No data found");
                }
            }

            $form = Mage::getBlock('Block\Admin\Brand\Edit')->setTableRow($brand)->toHtml();
            $this->makeResponse($form);

        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function saveAction()
    {
        try
        {
           
            if(!$this->getRequest()->isPost())
            {
                throw new Exception("Invalid Request.");
            }
            $brand = Mage::getModel('Model\Brand');

            if($id = $this->getRequest()->getGet('id'))
            {
                $brand = $brand->load($id);
                if(!$brand)
                {
                    throw new Exception("Record not found.");
                }
            }
            $brandData = $this->getRequest()->getPost('brand');

            if(!$brand->createdDate)
            {
                $brand->createdDate = date('Y-m-d');
            }

            $brand->setData($brandData);

            $image = $_FILES['file']['name'];
            $tmpName = $_FILES['file']['tmp_name'];
            
            move_uploaded_file($tmpName, 'C:\xampp\htdocs\myProject\practice\Image\\'.$image);
            $brand->image = $image;
            $brand->save();
            
            $this->getMessage()->setSuccess('Data saved successfully!!');
            $grid = Mage::getBlock('Block\Admin\Brand\Grid')->toHtml();
            $this->makeResponse($grid);

        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function deleteAction()
    {
        $brand = Mage::getModel('Model\Brand');
        $id = $this->getRequest()->getGet('id');
        $brand->load($id);
        
        unlink('C:\xampp\htdocs\myProject\practice\Image\\'.$brand->image);
        $brand->delete($id);
        
        $grid = Mage::getBlock('Block\Admin\Brand\Grid')->toHtml();
        $this->makeResponse($grid);
    }
}

?>