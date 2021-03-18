<?php

namespace Block\Admin\Attribute\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Edit');

class Option extends \Block\Core\Edit 
{
    protected $attribute = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Attribute/Form/Tabs/option.php');
    }
    public function setAttribute($attribute = null)
    {
        if(!$attribute)
        {
            $attribute = \Mage::getModel('Model\Attribute');
            if($id = (int)$this->getRequest()->getGet('id'))
            {
                $attribute =$attribute->load($id);
            }
        }
        $this->attribute = $attribute;
        return $this;
    }
    public function getAttribute()
    {
        if(!$this->attribute)
        {
            $this->setAttribute();
        }
        return $this->attribute;
    }
    public function getOptions()
    {
        $options = \Mage::getModel('Model\Attribute\Option');

        if(!$id = $this->getAttribute()->attributeId)
        {
            return false;
        }
        
        $query = "SELECT * FROM  `{$options->getTableName()}` WHERE `attributeId` = '{$id}' ORDER BY `sortOrder` ASC;";
        $options = $options->fetchAll($query);
        return $options;
    }
}

?>