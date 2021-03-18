<?php 

namespace Model\Product;

\Mage::loadFileByClassName('Model\Core\Table');

class Media extends \Model\Core\Table
{

    public function __construct(){

        parent::__construct();
        $this->setTableName('media');
        $this->setPrimaryKey('imageId');
    }

    // public function getImagePath($subPath = null)
    // {
    //     return \Mage::getBaseDir('\myProject\practice\Image\\');
    // }
}