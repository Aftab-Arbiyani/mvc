<?php

namespace Controller\Admin;
use Mage;
use Exception;

Mage::loadFileByClassName('Model\Category');
Mage::loadFileByClassName('Controller\Core\Admin');

class Category extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $this->renderLayout();
    }

    public function gridAction()
    {
        $grid = Mage::getBlock('Block\Admin\Category\Grid')->toHtml();
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
            $category = Mage::getModel('Model\Category');
            if($id = (int)$this->getRequest()->getGet('id')){
                if(!$category->load($id)){
                    throw new Exception("No data found");
                }
            }
            $formHtml = Mage::getBlock('Block\Admin\Category\Edit')->setTableRow($category)->toHtml();

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
            if(!$this->getRequest()->isPost())
            {
                throw new Exception("Invalid Request.");
            }

            $modelCategory = Mage::getModel('Model\Category');

            if ($categoryId = $this->getRequest()->getGet('id'))
            {
                $modelCategory = $modelCategory->load($categoryId);

                if (!$modelCategory)
                { 
                    throw new Exception("invalid id.", 1);
                }
            }

            $categoryPathId = $modelCategory->pathId;

            $postData = $this->getRequest()->getPost('category');
            $modelCategory->setData($postData);

            
            $modelCategory->save();

            $modelCategory->updatePathId();
            $modelCategory->updateChildrenPathIds($categoryPathId);

            $grid = Mage::getController('Block\Admin\Category\Grid')->toHtml();
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
            $category = Mage::getModel('Model\Category');
            $category->load($id);
            $categoryPathId = $category->pathId;
            $categoryParentId = $category->parentId;
            $category->updateChildrenPathIds($categoryPathId, $categoryParentId);


            $category->delete($id);
            $grid = Mage::getBlock('Block\Admin\Category\Grid')->toHtml();
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