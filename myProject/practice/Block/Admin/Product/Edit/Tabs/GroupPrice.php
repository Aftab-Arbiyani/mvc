<?php

namespace Block\Admin\Product\Edit\Tabs;

class GroupPrice extends \Block\Core\Edit
{
    protected $product = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Product/Form/Tabs/groupPrice.php');
    }

    public function setProducts($product = null){  

        if($product){
            $this->product = $product;
            return $this;
        }

        $product = \Mage::getModel('Model\Product');
        
        if($id = $this->getRequest()->getGet('id'))
        {
            $product = $product->load($id);
        }
        $this->product = $product;
        return $this;
    }
    public function getProducts()
    {
        if(!$this->product){
            $this->setProducts();
        }
        return $this->product;
    }
    public function getCustomerGroup()
    {
        $query = "SELECT cg.*, pgp.productId, pgp.entityId, pgp.price as groupPrice,
        if(p.price IS NULL, '{$this->getProducts()->price}', p.price) as price
        FROM `customer_group` as cg  
        LEFT JOIN `product_group_price` as pgp
            ON pgp.customerGroupId = cg.groupId
                AND pgp.productId = '{$this->getProducts()->productId}'
        LEFT JOIN `product` as p 
            ON pgp.productId = p.productId;";

        $customerGroups = \Mage::getModel('Model\Customer\Group');
        return $customerGroups->fetchAll($query);
    }
}
?>