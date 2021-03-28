<?php

namespace Controller\Admin;
use Mage;
use Exception;

class Product extends \Controller\Core\Admin
{
    public function indexAction() 
    { 
        $this->renderLayout();
    }

    public function gridAction() 
    {
        $grid = Mage::getBlock('Block\Admin\Product\Grid')->toHtml();
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
            $product = Mage::getModel('Model\Product');
            if($id = (int)$this->getRequest()->getGet('id')){
                if(!$product->load($id)){
                    throw new Exception("No data found");
                }
            }
            $formHtml = Mage::getBlock('Block\Admin\Product\Edit')->setTableRow($product)->toHtml();
            
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
                throw new Exception("Invalid request");
            }

            $product = Mage::getModel('Model\Product');

            if($id = (int)$this->getRequest()->getGet('id')){
                
                $product = $product->load($id);
 
                if(!$product) 
                {
                    throw new Exception("Record not found.");
                }

                $product->updatedDate = date('Y-m-d');
            }

            $productData = $this->getRequest()->getPost('product');
            if(!$product->createdDate)
            {
                $product->createdDate = date('Y-m-d');
            }
            $product->setData($productData);

            if($product->save())
            {
                $this->getMessage()->setSuccess('Data saved successfully!!');

                $product1 = Mage::getModel('Model\Product');
                $query = "SELECT `productId` FROM `{$product1->getTableName()}` ORDER BY `productId` DESC LIMIT 1;";
                $productId = $product1->fetchRow($query);
  
                $productCategory = Mage::getModel('Model\ProductCat');
                $data = $this->getRequest()->getPost('category');
                $productCategory->setData($data);
                $productCategory->productId = $productId->productId;
                $productCategory->save();
            }
            else
            {
                $this->getMessage()->setFailure('Unable to save data.');
            }

            $grid = Mage::getBlock('Block\Admin\Product\Grid')->toHtml();

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

            $product = Mage::getModel('Model\Product');

            if($product->delete($id))
            {
                $this->getMessage()->setSuccess('Data deleted successfully');
            }
            else
            {
                $this->getMessage()->setFailure('Unable to delete data');
            } 
            
            $grid = Mage::getBlock('Block\Admin\Product\Grid')->toHtml();

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
    public function attributeAction()
    {
        $attributeData = $this->getRequest()->getPost('product');
        $product = Mage::getModel('Model\Product');
        $product->setData($attributeData);
        $product->productId = $this->getRequest()->getGet('id');
        $product->save();
    } 
    public function filterAction()
    {
        $filterData = $this->getRequest()->getPost('filter');
        $filter = Mage::getModel('Model\Admin\Filter');
        $filter->setFilter($filterData);

        // print_r($filterData);

        $grid = Mage::getBlock('Block\Admin\Product\Grid')->toHtml();

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
}
?>