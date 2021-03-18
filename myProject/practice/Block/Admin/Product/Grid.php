<?php 

namespace Block\Admin\Product;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template{

    protected $products = [];
   
    public function __construct() 
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Product/grid.php');
    }
    public function setProducts($product = null)
    { 
        if(!$product)
        {
            $product = \Mage::getModel('Model\Product');
            $product = $product->fetchAll();
        }
        $this->products = $product;
        return $this; 
    }
    public function getProducts()
    {
        if(!$this->products)
        {
            $this->setProducts();
        }
        return $this->products;
    }
}
?>