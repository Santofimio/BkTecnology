<?php
// @session_start();

// if ($_SESSION['permiso'] === true) {
    
include_once '../Model/Department/DepartmentModel.php';

class DepartmentController {

    private $objDepartment;

	public function __construct()
	{

		$this->objDepartment = New DepartmentModel();

	}

    public function getCreate()
    {

        include_once '../View/Department/create.php';
    }

    public function crear()
    {
        if(isset($_POST)){

            $name = $_POST['name'];
            $id = $this->objDepartment->autoIncrement("dep_id","department");
            $this->objDepartment->create("department",false,"$id,'$name'");
            $this->objDepartment->close();
            redirect(getUrl("Department","Department","consult"));

        }else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consult()
    {
        
        $depto = $this->objDepartment->consult("*","department");
        $this->objDepartment->close();
        include_once '../View/Department/consult.php';
    }

    function getEditar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $depto = $this->objDepartment->consult("*","department","dep_id=$id");
            $depto=mysqli_fetch_assoc($depto);
            $this->objDepartment->close();
            include_once '../View/Department/update.php';
        }
    }

    function editar()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $name = $_POST['name'];

            $this->objDepartment->update(
                "department",
                "dep_id='$id'",
                array(
                "name_depto"=>"'$name'"));

            $this->objDepartment->close();
            redirect(getUrl("Department","Department","consult"));
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    function eliminar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $this->objDepartment->delete("department","dep_id=$id");
            $this->objDepartment->close();
            redirect(getUrl("Department","Department","consult"));
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filtrar()
    {

        if(isset($_POST)){

            echo "estoy";

            $buscar = $_POST['buscar'];
            
            $depto = $this->objDepartment->consult("*","department","name_depto LIKE '%$buscar%'");
            include_once '../View/Department/filtro.php';
            $this->objDepartment->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>