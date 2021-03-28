<?php

namespace Controller\Admin\Product;
use Mage;
use Exception;

class Price extends \Controller\Core\Admin{


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
    public function saveAction()
    {
        try{
            if(!$this->getRequest()->isPost())
            {
                throw new Exception("Invalid Request.");
            }
            $groupData = $this->getRequest()->getPost('groupPrice');
            $id = $this->getRequest()->getGet('id');

            if(array_key_exists('new', $groupData))
            {
                foreach ($groupData['new'] as $groupId => $price)
                {
                    $groupPrice = Mage::getModel('Model\Product\Group\Price');
                    $groupPrice->customerGroupId = $groupId;
                    $groupPrice->productId = $id;
                    $groupPrice->price = $price;
                    $groupPrice->save();
                }
            }
            
            if(array_key_exists('exist', $groupData))
            {
                foreach ($groupData['exist'] as $groupId => $price)
                {
                    $query = "SELECT * FROM `product_group_price` 
                    WHERE `productId` = '{$id}' 
                    AND `customerGroupId` = '{$groupId}';";
        
                    $groupPrice = Mage::getController('Model\Product\Group\Price');
                    $groupPrice->fetchRow($query);
                    $groupPrice->price = $price;
                    $groupPrice->save();
                }
            }
        }catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
}
?>