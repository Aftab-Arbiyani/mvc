<?php

namespace Block\Admin\Product\Edit\Tabs;

class Attribute extends \Block\Core\Edit
{
    protected $attributes = null;
    protected $options = null;
    protected $attrOptions = [];

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Product/Form/Tabs/attribute.php');
    }

    public function setAttributes($attributes = null)
    {
        if($attributes)
        {
            $this->attributes = $attributes;
            return $this;
        }

        $attribute = \Mage::getModel('Model\Attribute');
        $query = "SELECT * FROM `{$attribute->getTableName()}` WHERE `entityTypeId` = 'product';";
        $attribute = $attribute->fetchAll($query);
        $this->attributes = $attribute;
        return $this;
    }
    public function getAttributes()
    {
        if(!$this->attributes)
        {
            $this->setAttributes();
        }
        return $this->attributes;
    }
    public function getOptions($id)
    {
        $option = \Mage::getModel('Model\Attribute\Option');
        $query = "SELECT * FROM `{$option->getTableName()}` WHERE `attributeId` = '{$id}';";
        $options = $option->fetchAll($query);
        $this->options = $options;
        return $this->options;
    }
    public function getAttrOptions($id)
    {
        $this->attrOptions = [];
        $option = $this->getOptions($id)->getData();

        foreach ($option as $key => $value) {
            $this->attrOptions[$value->name] = $value->name;
        }
        return $this->attrOptions;
    }
}
?>