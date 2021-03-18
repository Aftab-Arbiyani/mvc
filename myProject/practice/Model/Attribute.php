<?php

namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');

class Attribute extends Core\Table
{
    const BACKENDTYPE_VARCHAR = 'varchar(40)';
    const BACKENDTYPE_INT = 'int(11)';
    const BACKENDTYPE_DECIMAL = 'decimal';
    const BACKENDTYPE_TEXT = 'text';    

    const INPUTTYPE_TEXT = 'text';
    const INPUTTYPE_TEXTAREA = 'textarea';
    const INPUTTYPE_SELECT = 'select';
    const INPUTTYPE_CHECKBOX = 'checkbox';
    const INPUTTYPE_RADIO = 'radio';

    const ENTITYTYPE_PRODUCT = 'product';
    const ENTITYTYPE_CATEGORY = 'category';

    public function __construct()
    {
        parent::__construct();
        $this->setTableName('attribute');
        $this->setPrimaryKey('attributeId');
    }

    public function getBackendTypeOptions()
    {
        return [
            self::BACKENDTYPE_VARCHAR => 'Varchar',
            self::BACKENDTYPE_INT => 'Int',
            self::BACKENDTYPE_DECIMAL => 'Decimal',
            self::BACKENDTYPE_TEXT => 'Text'
        ];
    }

    public function getInputTypeOptions()
    {
        return [
            self::INPUTTYPE_TEXT => 'Text Box', 
            self::INPUTTYPE_TEXTAREA => 'Text Area',
            self::INPUTTYPE_SELECT => 'Select',
            self::INPUTTYPE_CHECKBOX => 'Checkbox',
            self::INPUTTYPE_RADIO => 'Radio'
        ];
    }
    public function getEntityTypeOptions()
    {
        return [
            self::ENTITYTYPE_PRODUCT => 'Product',
            self::ENTITYTYPE_CATEGORY => 'Category'
        ];
    }
}

?>