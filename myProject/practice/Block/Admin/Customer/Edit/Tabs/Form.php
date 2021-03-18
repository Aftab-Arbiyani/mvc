<?php 

namespace Block\Admin\Customer\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Edit');

class Form extends \Block\Core\Edit
{
    public function __construct()  
    {
        parent::__construct(); 
        $this->setTemplate('./View/Admin/Customer/Form/Tabs/form.php');
    }
    public function getCustomerGroups()
    {
        $customerGroup = \Mage::getModel('Model\Customer\Group');
        $query = "SELECT `groupId`, `name` FROM `{$customerGroup->getTableName()}`";
        return $customerGroupName = $customerGroup->getAdapter()->fetchPairs($query);
    }
}

?>