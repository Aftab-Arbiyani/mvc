<?php

namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Dashboard extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $this->renderLayout();
    }
    public function gridAction()
    {
        $response = [
            'status' => 'success',
            'message' => 'vadsz',
            'element' => [
                'selector' => '#contentHtml',
                'html' => null
            ]
        ];
        header("Content-type: application/json; charset=utf-8");
        echo json_encode($response);
    }
}

?>