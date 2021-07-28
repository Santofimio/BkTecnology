<?php
include_once '../Model/Provider/ProviderModel.php';

class ProviderController {

    private $objProvider;

	public function __construct()
	{
		$this->objProvider = New ProviderModel();
	}

    public function getCreate()
    {
        include_once '../View/Provider/create.php';
    }

    public function create()
    {
        if(isset($_POST)){

            $nit = $_POST['nit'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            $id = $this->objProvider->autoIncrement("prov_id","provider");
            $this->objProvider->create("provider",false,"$id,$nit,'$name','$address','$tel'");
            $this->consult();

        }else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consult()
    {
        
        $provider = $this->objProvider->consult("*","provider");
        $this->objProvider->close();
        include_once '../View/Provider/consult.php';
    }

    function getUpdate()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $provider = $this->objProvider->consult("*","Provider","prov_id=$id");
            $prov=mysqli_fetch_assoc($provider);
            $this->objProvider->close();
            include_once '../View/Provider/update.php';
        }
    }

    function update()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $nit = $_POST['nit'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];

            $this->objProvider->update(
                "Provider",
                "prov_id='$id'",
                array(
                "prov_nit"=>"'$nit'",
                "prov_name"=>"'$name'",
                "prov_address"=>"'$address'",
                "prov_tel"=>"'$tel'"));
            $this->consult();
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    function getDelete()
    {
        include_once '../View/Provider/delete.php';
    }

    function delete()
    {
        if(isset($_POST['id'])){

            $id = $_POST['id'];
            $this->objProvider->delete("provider","prov_id=$id");
            $this->consult();
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filter()
    {

        if(isset($_GET['buscar'])){

            $buscar = $_GET['buscar'];
            $provider = $this->objProvider->consult("*","provider","prov_nit LIKE '%$buscar%' or prov_name LIKE '%$buscar%'");
            include_once '../View/Provider/filter.php';
            $this->objProvider->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>