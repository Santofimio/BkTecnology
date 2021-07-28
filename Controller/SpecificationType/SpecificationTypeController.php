<?php
include_once '../Model/SpecificationType/SpecificationTypeModel.php';

class SpecificationTypeController {

    private $objSpecificationType;

	public function __construct()
	{
		$this->objSpecificationType = New SpecificationTypeModel();
	}

    public function getCreate()
    {
        include_once '../View/SpecificationType/create.php';
    }

    public function create()
    {
        if(isset($_POST)){

            $name = $_POST['name'];
            $id = $this->objSpecificationType->autoIncrement("spe_tip_id","specification_type");
            $this->objSpecificationType->create("specification_type",false,"$id,'$name'");
            $this->consult();

        }else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consult()
    {
        
        $specification_type = $this->objSpecificationType->consult("*","specification_type");
        $this->objSpecificationType->close();
        include_once '../View/SpecificationType/consult.php';
    }

    function getUpdate()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $specification_type = $this->objSpecificationType->consult("*","specification_type","spe_tip_id=$id");
            $spe_tip=mysqli_fetch_assoc($specification_type);
            $this->objSpecificationType->close();
            include_once '../View/SpecificationType/update.php';
        }
    }

    function update()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $name = $_POST['name'];

            $this->objSpecificationType->update(
                "specification_type",
                "spe_tip_id='$id'",
                array(
                "spe_tip_name"=>"'$name'"));
            $this->consult();
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    function getDelete()
    {
        include_once '../View/SpecificationType/delete.php';
    }

    function delete()
    {
        if(isset($_POST['id'])){

            $id = $_POST['id'];
            $this->objSpecificationType->delete("specification_type","spe_tip_id=$id");
            $this->consult();
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filter()
    {

        if(isset($_GET['buscar'])){

            $buscar = $_GET['buscar'];
            $specification_type = $this->objSpecificationType->consult("*","specification_type","spe_tip_name LIKE '%$buscar%'");
            include_once '../View/SpecificationType/filter.php';
            $this->objSpecificationType->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>