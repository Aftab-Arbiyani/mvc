<?php

namespace Block\Admin\CustomerGroup;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $customerGroups = [];
 
    public function __construct() 
    { 
        parent::__construct();
        $this->setTemplate('./View/Admin/CustomerGroup/grid.php');
    }
    public function setCustomerGroup($customerGroups = null)
    {
        if(!$customerGroups){
            $customerGroup = \Mage::getModel('Model\Customer\Group');
            $customerGroups = $customerGroup->fetchAll();
        }
        $this->customerGroups = $customerGroups;
        return $this;
    }
    public function getCustomerGroup()
    {
        if(!$this->customerGroups){
            $this->setCustomerGroup();
        }
        return $this->customerGroups;
    }
}

?>