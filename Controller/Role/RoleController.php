<?php
include_once '../Model/Role/RoleModel.php';

class RoleController {

    private $objRole;

	public function __construct()
	{
		$this->objRole = New RoleModel();
	}

    public function getCreate()
    {
        include_once '../View/Role/create.php';
    }

    public function create()
    {
        if(isset($_POST)){

            $name = $_POST['name'];
            $id = $this->objRole->autoIncrement("rol_id","role");
            $this->objRole->create("role",false,"$id,'$name'");
            $this->consult();

        }else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consult()
    {
        
        $role = $this->objRole->consult("*","role");
        $this->objRole->close();
        include_once '../View/Role/consult.php';
    }

    function getUpdate()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $role = $this->objRole->consult("*","role","rol_id=$id");
            $rol=mysqli_fetch_assoc($role);
            $this->objRole->close();
            include_once '../View/Role/update.php';
        }
    }

    function update()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $name = $_POST['name'];

            $this->objRole->update(
                "role",
                "rol_id='$id'",
                array(
                "rol_name"=>"'$name'"));
            $this->consult();
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    function getDelete()
    {
        include_once '../View/Role/delete.php';
    }

    function delete()
    {
        if(isset($_POST['id'])){

            $id = $_POST['id'];
            $this->objRole->delete("role","rol_id=$id");
            $this->consult();
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filter()
    {

        if(isset($_GET['buscar'])){

            $buscar = $_GET['buscar'];
            $role = $this->objRole->consult("*","role","rol_name LIKE '%$buscar%'");
            include_once '../View/Role/filter.php';
            $this->objRole->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>