<?php
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

    public function create()
    {
        if(isset($_POST)){

            $name = $_POST['name'];
            $id = $this->objDepartment->autoIncrement("dep_id","department");
            $this->objDepartment->create("department",false,"$id,'$name'");
            $this->consult();

        }else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consult()
    {
        
        $department = $this->objDepartment->consult("*","department");
        $this->objDepartment->close();
        include_once '../View/Department/consult.php';
    }

    function getUpdate()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $department = $this->objDepartment->consult("*","department","dep_id=$id");
            $dep=mysqli_fetch_assoc($department);
            $this->objDepartment->close();
            include_once '../View/Department/update.php';
        }
    }

    function update()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $name = $_POST['name'];

            $this->objDepartment->update(
                "department",
                "dep_id='$id'",
                array(
                "dep_name"=>"'$name'"));
            $this->consult();
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    function getDelete()
    {
        include_once '../View/Department/delete.php';
    }

    function delete()
    {
        if(isset($_POST['id'])){

            $id = $_POST['id'];
            $this->objDepartment->delete("department","dep_id=$id");
            $this->consult();
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filter()
    {

        if(isset($_GET['buscar'])){

            $buscar = $_GET['buscar'];
            $department = $this->objDepartment->consult("*","department","dep_name LIKE '%$buscar%'");
            include_once '../View/Department/filter.php';
            $this->objDepartment->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>