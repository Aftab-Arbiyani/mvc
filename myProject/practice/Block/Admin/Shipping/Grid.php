<?php 

namespace Block\Admin\Shipping;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template{

    protected $shipping = [];
   
    public function __construct(){
        parent::__construct();
        $this->setTemplate('./View/Admin/Shipping/grid.php'); 
    }
    public function setShipping($shipping = null)
    {
        if(!$shipping) 
        { 
            $shipping = \Mage::getModel('Model\Shipping');
            $shipping = $shipping->fetchAll();
        }
        $this->shipping = $shipping;
        return $this;
    }
    public function getshipping()
    {
        if(!$this->shipping)
        {
            $this->setShipping();
        }
        return $this->shipping;
    }
}
?>