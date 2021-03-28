<?php

namespace Block\Admin\Category\Edit\Tabs;
use Mage;

class Form extends \Block\core\Edit
{
    protected $categoryOptions = [];
 
    public function __construct() 
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Category/Form/Tabs/form.php');
    }
    public function getCategoryOptions()
    { 
        if(!$this->categoryOptions)
        { 
            $category = Mage::getModel('Model\Category');
            $query = "SELECT `categoryId`, `name` FROM `{$category->getTableName()}`;";
            $options = $category->getAdapter()->fetchPairs($query);

            $query = "SELECT `categoryId`, `pathId` FROM `{$category->getTableName()}`;";
            $this->categoryOptions = $category->getAdapter()->fetchPairs($query);

            if ($this->categoryOptions) {
                foreach ($this->categoryOptions as $categoryId => &$pathId) {

                    $pathIds = explode("=", $pathId);
                    foreach ($pathIds as $key => &$id)
                    {
                        if(array_key_exists($id, $options))
                        {
                            $id = $options[$id];
                        }
                    }
                    $pathId = implode('=>', $pathIds);
                }
            }
            $this->categoryOptions = ["-1" => "Select"] + $this->categoryOptions;
        }
        return $this->categoryOptions;
    }
}

?>