<?php

namespace Controller\Admin\Category;
use Mage;
use Exception;

class Media extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $this->renderLayout();
    }

    public function gridAction()
    {
        $grid = Mage::getBlock('Block\Admin\Category\Grid')->toHtml();
        $this->makeResponse($grid);
    }    
    public function saveAction()
    {
        try {
            if(!$this->getRequest()->isPost())
            {
                throw new Exception("Invalid Request.");
            }

            $media = Mage::getModel('Model\Category\Media');

            $image = $_FILES['file']['name'];
            $tmpName = $_FILES['file']['tmp_name'];

            move_uploaded_file($tmpName, 'C:\xampp\htdocs\myProject\practice\Image\\'.$image);

            $media->categoryId = $this->getRequest()->getGet('id');
            $media->image = $image;
            $media->save();

            $this->getMessage()->setSuccess('Data saved successfully.');
            $form = Mage::getBlock('Block\Admin\Category\Edit')->setTableRow($media)->toHtml();
            $this->makeResponse($form);

        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function updateAction()
    {
        try {
            if(!$this->getRequest()->isPost())
            {
                throw new Exception("Invalid Request.");
            } 
            $image1 = Mage::getModel('Model\Category\Media');
            $imageData = $this->getRequest()->getPost('image');

            foreach ($imageData['data'] as $key => $value) 
            {
                $value['icon'] = 0;
                $value['base'] = 0;

                $image1 = $image1->load($key);

                if($imageData['icon'] == $key){
                    $value['icon'] = 1;
                }
                if($imageData['base'] == $key){
                    $value['base'] = 1;
                }
                if(array_key_exists('banner', $value))
                {
                    if($value['banner'] == $key){
                        $value['banner'] = 1;
                    }
                }
                if (array_key_exists('active', $value)) 
                {
                    if($value['active'] == $key){
                        $value['active'] = 1;
                    }
                }
                
                $image1->setData($value);
                if($image1->save())
                {
                    $this->getMessage()->setSuccess('Data saved successfully.');
                }
                else 
                {
                    $this->getMessage()->setFailure("Unable to save data.");
                }
            }

            $form = Mage::getBlock('Block\Admin\Category\Edit')->setTableRow($image1)->toHtml();
            $this->makeResponse($form);

        } catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function deleteAction()
    {
        $image = Mage::getModel('Model\Category\Media');
        $image1 = Mage::getModel('Model\Category\Media');

        $imageData = $this->getRequest()->getPost('image');

        // print_r($imageData);
        if (array_key_exists('remove', $imageData)) 
        {
            foreach ($imageData['remove'] as $key => $value) 
            {
                $query = "SELECT `image` FROM `category_media` WHERE `imageId` = '{$key}';";
                $image = $image1->fetchAll($query);
                foreach ($image->getData() as $name) 
                {
                    unlink('C:\xampp\htdocs\myProject\practice\Image\\'.$name->image);
                }
                $image1->delete($key);
            }
        }

        $form = Mage::getBlock('Block\Admin\Category\Edit')->setTableRow($image1)->toHtml();
        $this->makeResponse($form);
    }
}

?>