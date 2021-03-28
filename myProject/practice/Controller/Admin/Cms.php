<?php

namespace Controller\Admin;
use Mage;
use Exception;

class Cms extends \Controller\Core\Admin
{
    public function indexAction() 
    {
        $this->renderLayout();
    }

    public function gridAction()
    {
        $grid = Mage::getBlock('Block\Admin\Cms\Grid')->toHtml();

        $response = [
            'status' => 'success',
            'message' => 'fdsxc',
            'element' => [
                'selector' => '#contentHtml',
                'html' => $grid
            ]
        ];
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($response);
    }
    public function formAction()
    {
        try {
                $cms = Mage::getModel('Model\Cms');
                if($id = (int)$this->getRequest()->getGet('id')){
                    if(!$cms->load($id)){
                        throw new Exception("No data found");
                    }
                }
                $form = Mage::getBlock('Block\Admin\Cms\Edit')->setTableRow($cms)->toHtml();

                $response = [
                    'status' => 'success',
                    'message' => 'ygwjdf',
                    'element' => [
                        'selector' => '#contentHtml',
                        'html' => $form
                    ]
                ];
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($response);
        }catch (Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function saveAction()
    {
        try{

            if(!$this->getRequest()->isPost())
            {
                throw new Exception("Invalid Request");
            }

            $cms = Mage::getModel('Model\Cms');

            if($id = (int)$this->getRequest()->getGet('id'))
            {
                $cms = $cms->load($id);

                if(!$cms)
                {
                    throw new Exception("Record not found.");
                }
            }
            $cmsData = $this->getRequest()->getPost('cms');

            if(!$cms->createdDate)
            {
                $cms->createdDate = date('Y-m-d');
            }

            $cms->setData($cmsData);

            if(!$cms->save())
            {
                $this->getMessage()->setSuccess('Data saved successfully!!');
            }
            else
            {
                $this->getMessage()->setFailure('Unable to save data.');
            }

            $grid = Mage::getBlock('Block\Admin\Cms\Grid')->toHtml();
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
            
            $cms = Mage::getModel('Model\Cms');
            $cms->delete($id);

            $grid = Mage::getBlock('Block\Admin\Cms\Grid')->toHtml();

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