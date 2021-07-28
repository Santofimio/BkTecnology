<?php
include_once '../Model/Product/ProductModel.php';

class ProductController {

    private $objProduct;

	public function __construct()
	{
		$this->objProduct = New ProductModel();
	}

    public function getCreate()
    {
        $category = $this->objProduct->consult("*","category");
        $specificationType = $this->objProduct->consult("*","specification_type");
        include_once '../View/Product/create.php';
    }

    public function create()
    {
        if(isset($_POST)){

            $name = $_POST['pro_name'];
            $description = $_POST['pro_description'];
            $price = $_POST['pro_price'];
            $cat_sub = $_POST['cat_sub_id'];
            $prov = $_POST['prov_id'];

            $id = $this->objProduct->autoIncrement("pro_id","product");
            $this->objProduct->create("product",false,"$id,'$name','$description',$price,$cat_sub,$prov");
            $this->consult();

        }else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consult()
    {
        
        $product = $this->objProduct->consult("p.pro_id,p.pro_name,p.pro_description,p.pro_price,c.cat_sub_name,pv.prov_name","product p, category_sub c, provider pv","p.cat_sub_id=c.cat_sub_id AND p.prov_id=pv.prov_id");
        $this->objProduct->close();
        include_once '../View/Product/consult.php';
    }

    function getUpdate()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $Product = $this->objProduct->consult("*","Product","prov_id=$id");
            $prov=mysqli_fetch_assoc($Product);
            $this->objProduct->close();
            include_once '../View/Product/update.php';
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

            $this->objProduct->update(
                "Product",
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
        include_once '../View/Product/delete.php';
    }

    function delete()
    {
        if(isset($_POST['id'])){

            $id = $_POST['id'];
            $this->objProduct->delete("Product","prov_id=$id");
            $this->consult();
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filter()
    {

        if(isset($_GET['buscar'])){

            $buscar = $_GET['buscar'];
            $Product = $this->objProduct->consult("*","Product","prov_nit LIKE '%$buscar%' or prov_name LIKE '%$buscar%'");
            include_once '../View/Product/filter.php';
            $this->objProduct->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>