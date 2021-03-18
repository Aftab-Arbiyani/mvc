<?php

namespace Block\Core;
use Mage;

class Edit extends Template
{
    protected $tab = null;
    protected $tableRow = null;
    protected $tabClass = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Core/edit.php');
    }

    public function getTabContent() 
    { 
        $tabBlock = $this->getTab();
        $tabs = $tabBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabBlock->getDefaultTab());
        if(!array_key_exists($tab, $tabs)){
            return null;
        }
        $block = Mage::getBlock($tabs[$tab]['block']);
        $block->setTableRow($this->getTableRow());
        echo $block->toHtml();
    }
    public function getTabHtml()
    {
        echo $this->getTab()->toHtml();
    }
    public function setTab($tab = null)
    {
        if(!$tab)
        {
            $tab = $this->getTabClass()->setTableRow($this->getTableRow());
        }
        $this->tab = $tab;
        return $this;
    }
    public function getTab()
    {
        if (!$this->tab) {
            $this->setTab();
        }
        return $this->tab;
    }
    public function setTableRow(\Model\Core\Table $tableRow)
    {
        $this->tableRow = $tableRow;
        return $this;
    }
    public function getTableRow()
    {
        return $this->tableRow;
    }
    public function getFormUrl()
    {
        return $this->getUrl()->geturl('save');
    }
    public function setTabClass($tabClass)
    {
        $this->tabClass = $tabClass;
        return $this;
    }
    public function getTabClass()
    {
        return $this->tabClass;
    }
}

?>