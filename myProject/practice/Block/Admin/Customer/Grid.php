<?php 

namespace Block\Admin\Customer;

\Mage::loadFileByClassName('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{
    public function prepareCollection()
    { 
        $customer = \Mage::getModel('Model\Customer');
        $query = "SELECT * FROM `customer` 
        JOIN `customer_group` 
            ON customer.groupId = customer_group.groupId 
        JOIN `customer_address` 
            ON customer.customerId = customer_address.customerId
                WHERE customer_address.addressType = 'billing';";

        $collection = $customer->fetchAll($query);
        $this->setCollection($collection);
        return $this;
    }
    public function prepareColumns()
    {
        $this->addColumn('customerId', ['field' => 'customerId', 'label' => 'Id', 'type' => 'number']);
        $this->addColumn('firstName', ['field' => 'firstName', 'label' => 'First Name', 'type' => 'text']);
        $this->addColumn('lastName', ['field' => 'lastName', 'label' => 'Last Name', 'type' => 'text']);
        $this->addColumn('email', ['field' => 'email', 'label' => 'Email', 'type' => 'text']);
        $this->addColumn('email', ['field' => 'email', 'label' => 'Email', 'type' => 'text']);
        $this->addColumn('Zipcode', ['field' => 'Zipcode', 'label' => 'Billing Zipcode', 'type' => 'number']);
        $this->addColumn('Zipcode', ['field' => 'Zipcode', 'label' => 'Billing Zipcode', 'type' => 'number']);
        $this->addColumn('name', ['field' => 'name', 'label' => 'Group Name', 'type' => 'text']);
        return $this;
    }
    public function prepareActions()
    {
        $this->addAction('edit', ['label' => 'Edit', 'method' => 'getEditUrl', 'ajax' => true]);
        $this->addAction('delete', ['label' => 'Delete', 'method' => 'getDeleteUrl', 'ajax' => true]);
        return $this;
    }
    public function getEditUrl($row)
    {
        $url = $this->getUrl()->geturl('form', null, ['id' => $row->customerId]);
        return "mage.setUrl('{$url}').resetParams().load()";
    }
    public function getDeleteUrl($row)
    {
        $url = $this->getUrl()->geturl('delete', null, ['id' => $row->customerId]);
        return "mage.setUrl('{$url}').resetParams().load()";
    }
    public function prepareButtons()
    {
        $this->addButtons('addnew', ['label' => 'Add New', 'method' => 'getAddNewUrl', 'ajax' => true]);
        return $this;
    }
    public function getAddNewUrl()
    {
        $url = $this->getUrl()->geturl('form');
        return "mage.setUrl('{$url}').resetParams().load()";
    }
}

?>