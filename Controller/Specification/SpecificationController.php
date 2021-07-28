<?php
include_once '../Model/Specification/SpecificationModel.php';

class SpecificationController {

    private $objSpecification;

	public function __construct()
	{
		$this->objSpecification = New SpecificationModel();
	}

    public function getCreate()
    {
        $specificationType = $this->objSpecification->consult("*","specification_type");
        include_once '../View/Specification/create.php';
    }

    public function create()
    {
        if(isset($_POST)){

            $name = $_POST['name'];
            $spe_tip = $_POST['spe_tip'];
            $id = $this->objSpecification->autoIncrement("spe_id","specification");
            $this->objSpecification->create("specification",false,"$id,'$name',$spe_tip");
            $this->consult();

        }else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consult()
    {
        
        $specification = $this->objSpecification->consult("s.spe_id, s.spe_name, st.spe_tip_name"," specification s , specification_type st","s.spe_tip_id=st.spe_tip_id");
        $this->objSpecification->close();
        include_once '../View/Specification/consult.php';
    }

    function getUpdate()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $specification = $this->objSpecification->consult("*","specification","spe_id=$id");
            $specificationType = $this->objSpecification->consult("*","specification_type");
            $spe=mysqli_fetch_assoc($specification);
            $this->objSpecification->close();
            include_once '../View/Specification/update.php';
        }
    }

    function update()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $name = $_POST['name'];
            $spe_tip = $_POST['spe_tip'];

            $this->objSpecification->update(
                "specification",
                "spe_id='$id'",
                array(
                "spe_name"=>"'$name'",
                "spe_tip_id"=>"'$spe_tip'"));
            $this->consult();
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    function getDelete()
    {
        include_once '../View/Specification/delete.php';
    }

    function delete()
    {
        if(isset($_POST['id'])){

            $id = $_POST['id'];
            $this->objSpecification->delete("specification","spe_id=$id");
            $this->consult();
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filter()
    {

        if(isset($_GET['buscar'])){

            $buscar = $_GET['buscar'];
            $specification = $this->objSpecification->consult("s.spe_id, s.spe_name, st.spe_tip_name"," specification s , specification_type st","s.spe_tip_id=st.spe_tip_id And (spe_name LIKE '%$buscar%' or spe_tip_name LIKE '%$buscar%')");
            include_once '../View/Specification/filter.php';
            $this->objSpecification->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }

    public function select()
    {

        if(isset($_POST['id'])){

            $id = $_POST['id'];
            $specification = $this->objSpecification->consult("*","specification","spe_id=$id");
            $this->objSpecification->close();
            echo "<option>seleccione...</option>";
            foreach ($specification as $spe) {
               echo "<option id='".$spe['spe_id']."'>".$spe['spe_name']."</option>";
            }

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>