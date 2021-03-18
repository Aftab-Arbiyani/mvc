<?php 

namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');

class Product extends Core\Table{

    const STATUS_ENABLED = 1;
    CONST STATUS_DISABLED = 0;
    public function __construct(){

        parent::__construct();
        $this->setTableName('product');
        $this->setPrimaryKey('productId');
    }
    public function getStatusOptions(){
        return [
            self::STATUS_DISABLED => "Disable",
            self::STATUS_ENABLED=> "Enable"
        ];
    }
}
?>