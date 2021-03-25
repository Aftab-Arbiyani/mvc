<?php 

namespace Model\Category;

\Mage::loadFileByClassName('Model\Core\Table');

class Media extends \Model\Core\Table
{

    public function __construct(){

        parent::__construct();
        $this->setTableName('category_media');
        $this->setPrimaryKey('imageId');
    }
}
?>