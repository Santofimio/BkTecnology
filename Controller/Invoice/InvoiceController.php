<?php
include_once '../Model/Invoice/InvoiceModel.php';

class InvoiceController {

    private $objInvoice;

	public function __construct()
	{
		$this->objInvoice = New InvoiceModel();
	}

    public function getInvoice(){

        $depto = $this->objInvoice->consult("*","department");
        include_once '../View/Invoice/Invoice.php';
    }

    
}
?>