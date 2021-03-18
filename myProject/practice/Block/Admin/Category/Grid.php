<?php

namespace Block\Admin\Category;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template{

    protected $categorys = [];
    protected $categoryOptions = []; 

    public function __construct(){
        $this->setTemplate('./View/Admin/Category/grid.php');
    }
    public function setCategory($category = null) 
    { 
        if(!$category){
            $category = \Mage::getModel('Model\Category');
            $category = $category->fetchAll();
        }
        $this->categorys = $category;
        return $this;
    }
    public function getCategory()
    {
        if(!$this->categorys){
            $this->setCategory();
        }
        return $this->categorys;
    }
    public function getName($category)
    {
        $modelCategory = \Mage::getModel('Model\Category');

        if(!$this->categoryOptions){
            $query = "SELECT `categoryId`, `name` FROM `{$modelCategory->getTableName()}`;";
            $this->categoryOptions = $modelCategory->getAdapter()->fetchPairs($query);
        }

        $pathIds = explode("=", $category->pathId);
        foreach ($pathIds as $key => &$id) {
            if(array_key_exists($id, $this->categoryOptions)){
                $id = $this->categoryOptions[$id];
            }
        }
        $name = implode('=>', $pathIds);
        return $name;
    }
}
?>
