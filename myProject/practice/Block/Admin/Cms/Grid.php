<?php 

namespace Block\Admin\Cms;

\Mage::loadFileByClassName('Block\Core\Template');
 
class Grid extends \Block\Core\Template{

    protected $cms = [];
    
    public function __construct(){
        parent::__construct();
        $this->setTemplate('./View/Admin/Cms/grid.php'); 
    }
    public function setcms($cms = null){
        if(!$cms){
            $cms = \Mage::getModel('Model\Cms');
            $cms = $cms->fetchAll();
        }
        $this->cms = $cms;
        return $this;
    }
    public function getcms(){
        if(!$this->cms){
            $this->setcms();
        }
        return $this->cms;
    }
}
?>