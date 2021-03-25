<?php 

namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Edit');

class Media extends \Block\Core\Edit
{
    protected $image = null;

    public function __construct()
    {
        parent::__construct();  
        $this->setTemplate('./View/Admin/Category/Form/Tabs/media.php');
    }
    public function setImage($image = null)
    {
        if(!$image) 
        {
            $id = $this->getRequest()->getGet('id');
            $image = \Mage::getModel('Model\Category\Media');
            $query = "SELECT * FROM `{$image->getTableName()}` WHERE `categoryId` = $id;";
            $image = $image->fetchAll($query);
        }
        $this->image = $image;
        return $this;
    }
    public function getImage()
    {
        if(!$this->image){
            $this->setImage();
        } 
        return $this->image;
    }
}

?> 