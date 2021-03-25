<?php

namespace Controller;
use Mage;

Mage::loadFileByClassName('Controller\Core\Customer');

class Home extends Core\Customer
{
    public function gridAction()
    {
        $layout = $this->getLayout();
        $grid = Mage::getBlock('Block\Home\Index');
        $content = $layout->getChild('content');
        $content->addChild($grid, 'grid');
        $this->renderLayout();
    }
    public function indexAction()
    {
        $pager = Mage::getController('Controller\Core\Pager');

        $query = "SELECT * FROM `product`";
        $product = Mage::getModel('Model\Product');
        $count = $product->getAdapter()->fetchOne($query);

        $pager->setTotalRecords($count);
        $pager->setRecordsPerPage(2);
        $pager->setCurrentPage($_GET['p']);
        $pager->calculatePage();

        echo '<pre>';
        print_r($pager);
    }
}

?>