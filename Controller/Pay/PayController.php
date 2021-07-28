<?php
include_once '../Model/Pay/PayModel.php';

class PayController {

    private $objPay;

	public function __construct()
	{
		$this->objPay = New PayModel();
	}

    public function getCreate()
    {
        include_once '../View/Pay/create.php';
    }

    public function create()
    {
        if(isset($_POST)){

            $name = $_POST['name'];
            $id = $this->objPay->autoIncrement("pay_id","Pay");
            $this->objPay->create("pay",false,"$id,'$name'");
            $this->consult();

        }else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consult()
    {
        
        $pay = $this->objPay->consult("*","pay");
        $this->objPay->close();
        include_once '../View/Pay/consult.php';
    }

    function getUpdate()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $pay = $this->objPay->consult("*","pay","pay_id=$id");
            $p=mysqli_fetch_assoc($pay);
            $this->objPay->close();
            include_once '../View/Pay/update.php';
        }
    }

    function update()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $name = $_POST['name'];

            $this->objPay->update(
                "pay",
                "pay_id='$id'",
                array(
                "pay_name"=>"'$name'"));
            $this->consult();
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    function getDelete()
    {
        include_once '../View/Pay/delete.php';
    }

    function delete()
    {
        if(isset($_POST['id'])){

            $id = $_POST['id'];
            $this->objPay->delete("pay","pay_id=$id");
            $this->consult();
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filter()
    {

        if(isset($_GET['buscar'])){

            $buscar = $_GET['buscar'];
            $pay = $this->objPay->consult("*","pay","pay_name LIKE '%$buscar%'");
            include_once '../View/Pay/filter.php';
            $this->objPay->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>