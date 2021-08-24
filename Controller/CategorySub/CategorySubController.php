<?php
include_once '../Model/CategorySub/CategorySubModel.php';

class CategorySubController {

    private $objCategorySub;

	public function __construct()
	{
		$this->objCategorySub = New CategorySubModel();
	}

    public function getCreate()
    {
        $category = $this->objCategorySub->consult("*", "category");
        include_once '../View/CategorySub/create.php';
    }

    public function create()
    {
        if(isset($_POST)){

            $name = $_POST['name'];
            $cat = $_POST['cat'];
            $id = $this->objCategorySub->autoIncrement("cat_sub_id","category_sub");

            if (isset($_FILES['imagen']['name'])) {
                $ext = explode(".", $_FILES['imagen']['name']);
                $name_img = $id . '-' . $name;
                $ruta_temp = $_FILES['imagen']['tmp_name'];
                $ruta_img = 'img/categorySub/' . $name_img . '.' . end($ext);

                if (move_uploaded_file($ruta_temp, $ruta_img)) {
                    $imagen = $ruta_img;
                } else {
                    $imagen = null;
                }
            } else {
                $imagen = null;
            }

            $this->objCategorySub->create("category_sub",false,"$id,'$name','$imagen',$cat");
            $this->consult();

        }else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consult()
    {
        
        $categorySub = $this->objCategorySub->consult("cs.cat_sub_id, cs.cat_sub_name, c.cat_name"," category_sub cs , category c","cs.cat_id=c.cat_id");
        $this->objCategorySub->close();
        include_once '../View/CategorySub/consult.php';
    }

    function getUpdate()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $categorySub = $this->objCategorySub->consult("*","category_sub","cat_sub_id=$id");
            $category = $this->objCategorySub->consult("*", "category");
            $cat_sub=mysqli_fetch_assoc($categorySub);
            $this->objCategorySub->close();
            include_once '../View/CategorySub/update.php';
        }
    }

    function update()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $name = $_POST['name'];
            $cat = $_POST['cat'];
            $imagen_old = $_POST['imagen_old'];

            if ($_FILES['imagen']['tmp_name']) {
                $ext = explode(".", $_FILES['imagen']['name']);
                $name_img = $id . '-' . $name;
                $ruta_temp = $_FILES['imagen']['tmp_name'];
                $ruta_img = 'img/categorySub/' . $name_img . '.' . end($ext);

                if (move_uploaded_file($ruta_temp, $ruta_img)) {
                    $imagen = $ruta_img;
                }
            } else {
                $imagen = $imagen_old;
            }

            $this->objCategorySub->update(
                "category_sub",
                "cat_sub_id='$id'",
                array(
                "cat_sub_name"=>"'$name'",
                "cat_sub_img"=>"'$imagen'",
                "cat_id"=>"'$cat'"));
             $this->consult();
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    function getDelete()
    {
        include_once '../View/CategorySub/delete.php';
    }

    function delete()
    {
        if(isset($_POST['id'])){

            $id = $_POST['id'];
            $this->objCategorySub->delete("category_sub","cat_sub_id=$id");
            $this->consult();
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filter()
    {

        if(isset($_GET['buscar'])){

            $buscar = $_GET['buscar'];
            $categorySub = $this->objCategorySub->consult("cs.cat_sub_id, cs.cat_sub_name, c.cat_name"," category_sub cs , category c","cs.cat_id=c.cat_id And (cat_sub_name LIKE '%$buscar%' or cat_name LIKE '%$buscar%')");
            include_once '../View/CategorySub/filter.php';
            $this->objCategorySub->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }

    public function select()
    {

        if(isset($_POST['id'])){

            $id = $_POST['id'];
            $categorySub = $this->objCategorySub->consult("*","category_sub","cat_id=$id");
            $this->objCategorySub->close();
            echo "<option>seleccione...</option>";
            foreach ($categorySub as $cs) {
               echo "<option value='".$cs['cat_sub_id']."'>".$cs['cat_sub_name']."</option>";
            }

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>