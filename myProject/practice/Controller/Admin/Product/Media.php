<?php

namespace Controller\Admin\Product;
use Mage;
use Exception;

class Media extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $this->renderLayout();
    }

    public function gridAction()
    {
        $grid = Mage::getBlock('Block\Admin\Product\Grid')->toHtml();
        $this->makeResponse($grid);
    }
    public function saveAction()
    {
        try
        {
            if(!$this->getRequest()->isPost())
            {
                throw new Exception("Invalid Request.");
            }

            $media = Mage::getModel('Model\Product\Media');
            // $path = $media->getImagePath();
            $image = $_FILES['file']['name'];
            $tmpName = $_FILES['file']['tmp_name'];
            move_uploaded_file($tmpName, 'C:\xampp\htdocs\myProject\practice\Image\\'.$image);

            $media->productId = $this->getRequest()->getGet('id');
            $media->image = $image;

            if($media->save())
            {
                $this->getMessage()->setSuccess('Data saved successfully.');
            }
            else 
            { 
                $this->getMessage()->setFailure("Unable to save data.");
            }
            $form = Mage::getBlock('Block\Admin\Product\Edit')->setTableRow($media)->toHtml();
            $this->makeResponse($form);
            
        }catch (Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
        
    }
    public function updateAction()
    {
        try
        {
            if(!$this->getRequest()->isPost())
            {
                throw new Exception("Invalid Request.");
            }   
            $image1 = Mage::getModel('Model\Product\Media');

            $imageData = $this->getRequest()->getPost('image');

            foreach ($imageData['data'] as $key => $value)
            {
                $value['small'] = 0; 
                $value['thumb'] = 0;
                $value['base'] = 0;

                $image1 = $image1->load($key);  
                if($imageData['small'] == $key){
                    $value['small'] = 1;
                }

                if($imageData['thumb'] == $key){
                    $value['thumb'] = 1;
                }

                if($imageData['base'] == $key){
                    $value['base'] = 1;
                }
                if($value['gallery'] == $key){
                    $value['gallery'] = 1;
                }
                $image1->setData($value);
                
            }
            $form = Mage::getBlock('Block\Admin\Product\Edit')->setTableRow($image1)->toHtml();
            $this->makeResponse($form);

        }catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function deleteAction()
    {
        $image = Mage::getModel('Model\Product\Media');
        $image1 = Mage::getModel('Model\Product\Media');

        $imageData = $this->getRequest()->getPost('image');

        if(array_key_exists('remove', $imageData))
        {
            foreach ($imageData['remove'] as $key => $value)
            {
                $query = "SELECT `image` FROM `media` WHERE `imageId`= '{$key}';";
                $image = $image->fetchAll($query);
                foreach ($image->getData() as $name)
                {
                    unlink('C:\xampp\htdocs\myProject\practice\Image\\'.$name->image);
                }
                $image1->delete($key);
            }
        }
        $this->getMessage()->setSuccess('Data deleted successfully.');
        $form = Mage::getBlock('Block\Admin\Product\Edit')->setTableRow($image1)->toHtml();
        $this->makeResponse($form);
    }
}

?>
