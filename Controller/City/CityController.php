<?php
include_once '../Model/City/CityModel.php';

class CityController {

    private $objCity;

	public function __construct()
	{
		$this->objCity = New CityModel();
	}

    public function getCreate()
    {
        $department = $this->objCity->consult("*", "department");
        include_once '../View/City/create.php';
    }

    public function create()
    {
        if(isset($_POST)){

            $name = $_POST['name'];
            $dep = $_POST['dep'];
            $id = $this->objCity->autoIncrement("cit_id","city");
            $this->objCity->create("city",false,"$id,'$name',$dep");
            $this->consult();

        }else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consult()
    {
        
        $city = $this->objCity->consult("c.cit_id, c.cit_name, d.dep_name", "city c, department d", "c.dep_id=d.dep_id");
        $this->objCity->close();
        include_once '../View/City/consult.php';
    }

    function getUpdate()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $department = $this->objCity->consult("*", "department");
            $city = $this->objCity->consult("*","city","cit_id=$id");
            $cit=mysqli_fetch_assoc($city);
            $this->objCity->close();
            include_once '../View/City/update.php';
        }
    }

    function update()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $name = $_POST['name'];
            $dep = $_POST['dep'];

            $this->objCity->update(
                "city",
                "cit_id='$id'",
                array(
                "cit_name"=>"'$name'",
                "dep_id"=>"'$dep'"));
            $this->consult();
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    function getDelete()
    {
        include_once '../View/City/delete.php';
    }

    function delete()
    {
        if(isset($_POST['id'])){

            $id = $_POST['id'];
            $this->objCity->delete("city","cit_id=$id");
            $this->consult();
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filter()
    {

        if(isset($_GET['buscar'])){

            $buscar = $_GET['buscar'];
            $city = $this->objCity->consult("c.cit_id, c.cit_name, d.dep_name", "city c, department d", "c.dep_id=d.dep_id and (cit_name LIKE '%$buscar%' or dep_name LIKE '%$buscar%')");
            include_once '../View/city/filter.php';
            $this->objCity->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>