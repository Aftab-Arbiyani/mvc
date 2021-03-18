<?php

namespace Block\Admin\Payment;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template{

    protected $payment = [];
   
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Payment/grid.php');
    }
    public function setPayments($payment = null)
    {
        if(!$payment) 
        { 
            $payment = \Mage::getModel('Model\Payment'); 
            $payment = $payment->fetchAll();
        }
        $this->payment = $payment;
        return $this;
    }
    public function getPayments()
    {
        if(!$this->payment){
            $this->setPayments();
        }
        return $this->payment;
    }
}
?>