<?php

namespace Controller;
use Mage;
Mage::loadFileByClassName('Controller\Core\Customer');

class Home extends Core\Customer
{
    public function gridAction()
    {
        echo 'hello';

    }
}

?>