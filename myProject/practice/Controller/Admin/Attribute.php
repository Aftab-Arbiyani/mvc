<?php

namespace Controller\Admin;
use Mage;
use Exception;

class Attribute extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $this->renderLayout();
    }
    public function gridAction()
    {
        $grid = Mage::getBlock('Block\Admin\Attribute\Grid')->toHtml();

        $response = [
            'status' => 'success',
            'message' => 'dsac',
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
            $attribute = Mage::getModel('Model\Attribute');
            if($id = (int)$this->getRequest()->getGet('id')){
                if(!$attribute->load($id)){
                    throw new Exception("No data found");
                }
            }
            $formHtml = Mage::getBlock('Block\Admin\Attribute\Edit')->setTableRow($attribute)->toHtml();
            
            $response = [
                'status' => 'success',
                'message' => 'edksa',
                'element' => [
                    'selector' => '#contentHtml',
                    'html' => $formHtml
                ]
            ];
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($response);
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function saveAction()
    {
        try {
            if(!$this->getRequest()->isPost())
            {
                throw new Exception("Invalid Request.");
            }
            $attribute = Mage::getModel('Model\Attribute');

            if($id = (int) $this->getRequest()->getGet('id'))
            {
                $attribute = $attribute->load($id);

                if(!$attribute)
                {
                    throw new Exception("No data found.");
                }
            }
            $attributeData = $this->getRequest()->getPost('attribute');

            $query = "ALTER TABLE `product` ADD {$attributeData['code']} {$attributeData['backendType']}(20);";
            $adapter = Mage::getModel('Model\Core\Adapter');
            $adapter->select($query);

            $attribute->setData($attributeData);

            if($attribute->save())
            {
                $this->getMessage()->setSuccess('Data saved successfully!!');
            }
            else
            {
                $this->getMessage()->setFailure('Unable to save data.');
            }

            $grid = Mage::getBlock('Block\Admin\Attribute\Grid')->toHtml();

            $response = [
                'status' => 'success',
                'message' => 'ewfa',
                'element' => [
                    'selector' => '#contentHtml', 
                    'html' => $grid
                ]
            ];

            header('Content-type: application/json; charset=utf-8');
            echo json_encode($response);
        } 
        catch (Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function deleteAction()
    {
        try {
            if (!$id = (int) $this->getRequest()->getGet('id'))
            {
                throw new Exception("Invalid Request.");
            }

            $attribute = Mage::getModel('Model\Attribute');
            if($attribute->delete($id))
            {
                $this->getMessage()->setSuccess('Data deleted successfully');
            }
            else
            {
                $this->getMessage()->setFailure('Unable to delet data');
            } 


            $grid = Mage::getBlock('Block\Admin\Attribute\Grid')->toHtml();

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
        catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage);
        }               
    }
    public function optionAction()
    {
        $optionIds = null;
        $existingData = $this->getRequest()->getPost('exist');

        $names = $this->getRequest()->getPost('name');
        $sortOrders = $this->getRequest()->getPost('sortOrder');

        if($names || $sortOrders)
        {
            $result = array_combine($sortOrders['new'], $names['new']);
        }

        $attributeId = $this->getRequest()->getGet('id');

        if($existingData)
        {
            foreach ($existingData as $optionId => $value)
            {
                $option = Mage::getModel('Model\Attribute\Option');

                $option->optionId = $optionId;
                $option->name = $value['name'];
                $option->sortOrder = $value['sortOrder'];
                $option->attributeId = $attributeId;
                $optionIds = $optionIds.", ".$optionId;
                $option->save();
            }
            $optionIds = substr($optionIds, 1);

            $query = "DELETE FROM `attribute_option` WHERE `optionId` NOT IN ($optionIds)";
            $adapter = Mage::getModel('Model\Core\Adapter');
            $adapter->delete($query);
        }

        if($result)
        {
            foreach ($result as $sortOrder => $name) 
            {
                $option1 = Mage::getModel('Model\Attribute\Option');
                if($sortOrder || $name)
                {
                    $option1->name = $name;
                    $option1->sortOrder = $sortOrder;
                    $option1->attributeId = $attributeId;
                    $option1->save();
                }
            }
        }
    }
}

?>