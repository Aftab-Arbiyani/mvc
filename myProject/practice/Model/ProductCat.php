<?php

namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');

class ProductCat extends Core\Table{
    
    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;

    public function __construct(){
        parent::__construct();
        $this->setTableName('product_category');
        $this->setPrimaryKey('entityId');
    }
}
?>