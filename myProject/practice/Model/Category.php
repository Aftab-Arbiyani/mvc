<?php 

namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');


class Category extends Core\Table{

    const STATUS_ENABLED = 1;
    CONST STATUS_DISABLED = 0;
    
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('category');
        $this->setPrimaryKey('categoryId');
    }
    public function getStatusOptions(){
        return [
            self::STATUS_DISABLED => "Disable",
            self::STATUS_ENABLED => "Enable"
        ];
    }
    public function updatePathId() 
    {
        if(!$this->parentId)
        {
            $pathId = $this->categoryId;
        }
        else
        {
            $parent = \Mage::getModel('Model\Category')->load($this->parentId);

            if(!$parent)
            {
                throw new \Exception("unable to load.", 1);
            }
            $pathId = $parent->pathId.'='.$this->categoryId;
        }
        $this->pathId = $pathId;
        return $this->save();
    }
    public function updateChildrenPathIds($categoryPathId, $parentId = null)
    {
        $categoryPathId = $categoryPathId.'=';
        $query = "SELECT * FROM `category` WHERE `pathId` LIKE '{$categoryPathId}%' ORDER BY `pathId` ASC";
        $categories = $this->fetchAll($query);

        if($categories){
            foreach ($categories->getData() as $value) {
                if($parentId != null){
                    $value->parentId = $parentId;
                }
                $value->updatePathId(); 
            }
        }
    }
}
?>