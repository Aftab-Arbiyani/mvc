<?php

namespace Controller\Admin;

class Dashboard extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $this->renderLayout();
    }
    public function gridAction()
    {
        $this->makeResponse();
    }
}

?>