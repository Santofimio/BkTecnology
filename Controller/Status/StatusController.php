<?php
include_once '../Model/Status/StatusModel.php';

class StatusController {

    private $objStatus;

	public function __construct()
	{
		$this->objStatus = New StatusModel();
	}

    public function getCreate()
    {
        include_once '../View/Status/create.php';
    }

    public function create()
    {
        if(isset($_POST)){

            $name = $_POST['name'];
            $id = $this->objStatus->autoIncrement("sta_id","status");
            $this->objStatus->create("status",false,"$id,'$name'");
            $this->consult();

        }else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consult()
    {
        
        $status = $this->objStatus->consult("*","status");
        $this->objStatus->close();
        include_once '../View/Status/consult.php';
    }

    function getUpdate()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $status = $this->objStatus->consult("*","status","sta_id=$id");
            $sta=mysqli_fetch_assoc($status);
            $this->objStatus->close();
            include_once '../View/Status/update.php';
        }
    }

    function update()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $name = $_POST['name'];

            $this->objStatus->update(
                "Status",
                "sta_id='$id'",
                array(
                "sta_name"=>"'$name'"));
            $this->consult();
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    function getDelete()
    {
        include_once '../View/Status/delete.php';
    }

    function delete()
    {
        if(isset($_POST['id'])){

            $id = $_POST['id'];
            $this->objStatus->delete("status","sta_id=$id");
            $this->consult();
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filter()
    {

        if(isset($_GET['buscar'])){

            $buscar = $_GET['buscar'];
            $status = $this->objStatus->consult("*","status","sta_name LIKE '%$buscar%'");
            include_once '../View/Status/filter.php';
            $this->objStatus->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>