<?php

namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');

class Cms extends Core\Table{

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    public function __construct()
    {
        parent::__construct();
        $this->setTableName('cms_page');
        $this->setPrimaryKey('pageId');
    }
    public function getStatusOptions(){
        return [
            self::STATUS_DISABLED => "Disable",
            self::STATUS_ENABLED=> "Enable"
        ];
    }
}

?> 