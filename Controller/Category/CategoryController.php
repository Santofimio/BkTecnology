<?php
include_once '../Model/Category/CategoryModel.php';

class CategoryController {

    private $objCategory;

	public function __construct()
	{
		$this->objCategory = New CategoryModel();
	}

    public function getCreate()
    {
        include_once '../View/Category/create.php';
    }

    public function create()
    {
        if(isset($_POST)){

            $name = $_POST['name'];
            $id = $this->objCategory->autoIncrement("cat_id","category");
            $this->objCategory->create("category",false,"$id,'$name'");
            $this->consult();

        }else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consult()
    {
        
        $category = $this->objCategory->consult("*","category");
        $this->objCategory->close();
        include_once '../View/Category/consult.php';
    }

    function getUpdate()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $category = $this->objCategory->consult("*","Category","cat_id=$id");
            $cat=mysqli_fetch_assoc($category);
            $this->objCategory->close();
            include_once '../View/Category/update.php';
        }
    }

    function update()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $name = $_POST['name'];

            $this->objCategory->update(
                "category",
                "cat_id='$id'",
                array(
                "cat_name"=>"'$name'"));
            $this->consult();
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    function getDelete()
    {
        include_once '../View/Category/delete.php';
    }

    function delete()
    {
        if(isset($_POST['id'])){

            $id = $_POST['id'];
            $this->objCategory->delete("category","cat_id=$id");
            $this->consult();
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filter()
    {

        if(isset($_GET['buscar'])){

            $buscar = $_GET['buscar'];
            $category = $this->objCategory->consult("*","category","cat_name LIKE '%$buscar%'");
            include_once '../View/Category/filter.php';
            $this->objCategory->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>