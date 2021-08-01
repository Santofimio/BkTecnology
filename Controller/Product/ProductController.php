<?php
include_once '../Model/Product/ProductModel.php';

class ProductController
{

    private $objProduct;

    public function __construct()
    {
        $this->objProduct = new ProductModel();
    }

    public function getCreate()
    {
        $category = $this->objProduct->consult("*", "category");
        $provider = $this->objProduct->consult("*", "provider");
        $specificationType = $this->objProduct->consult("*", "specification_type");
        include_once '../View/Product/create.php';
    }

    public function create()
    {
        if (isset($_POST)) {

            $name = $_POST['name'];
            $price = $_POST['price'];
            $summary = $_POST['summary'];
            $cat_sub = $_POST['categorySub'];
            $provider = $_POST['provider'];

            $id = $this->objProduct->autoIncrement("pro_id", "product");
            $this->objProduct->create("product", false, "$id,'$name','$summary',$price,$cat_sub,$provider");

            if (isset($_POST['specification'])) {

                $specification = $_POST['specification'];
                $spe_description = $_POST['spe_description'];

                for ($i = 0; $i < count($specification); $i++) {

                    $ids = $this->objProduct->autoIncrement("pro_spe_id", "product_specification");
                    $this->objProduct->create(
                        "product_specification",
                        false,
                        "$ids, '" . $spe_description[$i] . "', " . $id . ", " . $specification[$i]
                    );
                }
            }

            if (isset($_FILES['imagen'])) {
                // echo "<pre>";
                // print_r($_FILES['imagen']);
                // echo "</pre>";


                for ($i = 0; $i < count($_FILES['imagen']['name']); $i++) {

                    $id_img = $this->objProduct->autoIncrement("pro_img_id", "product_img");

                    $ext = explode(".", $_FILES['imagen']['name'][$i]);
                    $name_img = $id_img . '-' . $name;
                    $ruta_temp = $_FILES['imagen']['tmp_name'][$i];
                    $ruta_img = 'img/product/' . $name_img . '.' . end($ext);

                    if (move_uploaded_file($ruta_temp, $ruta_img)) {
                        $ruta_imagen = $ruta_img;
                    } else {
                        $ruta_imagen = null;
                    }

                    $this->objProduct->create(
                        "product_img",
                        false,
                        "$id_img,'" . $name_img . "','" . $ruta_imagen . "'," . $id
                    );
                }
            }
            $this->consult();
        } else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consult()
    {
        $product = $this->objProduct->consult("p.pro_id,p.pro_name,p.pro_summary,p.pro_price,c.cat_sub_name,pv.prov_name", "product p, category_sub c, provider pv", "p.cat_sub_id=c.cat_sub_id AND p.prov_id=pv.prov_id");
        $this->objProduct->close();
        include_once '../View/Product/consult.php';
    }

    function getUpdate()
    {
        if (isset($_GET)) {

            $id = $_GET['id'];
            $provider = $this->objProduct->consult("*", "provider");
            $category = $this->objProduct->consult("*", "category");
            $cat_sub = $this->objProduct->consult("cs.cat_sub_id, cs.cat_sub_name, c.cat_id, c.cat_name", "category_sub cs, category c, product p", "cs.cat_id=c.cat_id AND p.cat_sub_id=cs.cat_sub_id AND p.pro_id=$id");
            $cs = mysqli_fetch_assoc($cat_sub);
            $category_sub = $this->objProduct->consult("*", "category_sub", "cat_id=" . $cs['cat_id'] . "");
            $specifications = $this->objProduct->consult("pro_spe_id,pro_spe_description,spe_name,spe_tip_name", "product_specification ps,specification s,specification_type st", "ps.spe_id=s.spe_id AND s.spe_tip_id=st.spe_tip_id");
            $specificationType = $this->objProduct->consult("*", "specification_type");
            $product = $this->objProduct->consult("*", "Product", "pro_id=$id");
            $product_img = $this->objProduct->consult("*", "product_img", "pro_id=$id");
            $pro = mysqli_fetch_assoc($product);
            $this->objProduct->close();
            include_once '../View/Product/update.php';
        }
    }

    function update()
    {
        if (isset($_POST)) {

            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $summary = $_POST['summary'];
            $cat_sub = $_POST['categorySub'];
            $provider = $_POST['provider'];

            $this->objProduct->update(
                "Product",
                "pro_id='$id'",
                array(
                    "pro_name" => "'$name '",
                    "pro_price" => "'$price'",
                    "pro_summary" => "'$summary'",
                    "cat_sub_id" => "'$cat_sub'",
                    "prov_id" => "'$provider'"
                )
            );

            if (isset($_POST['specification'])) {

                $specification = $_POST['specification'];
                $spe_description = $_POST['spe_description'];

                for ($i = 0; $i < count($specification); $i++) {

                    $ids = $this->objProduct->autoIncrement("pro_spe_id", "product_specification");
                    $this->objProduct->create(
                        "product_specification",
                        false,
                        "$ids, '" . $spe_description[$i] . "', " . $id . ", " . $specification[$i]
                    );
                }
            }

            if (isset($_FILES['imagen'])) {
                
                for ($i = 0; $i < count($_FILES['imagen']['name']); $i++) {

                    $id_img = $this->objProduct->autoIncrement("pro_img_id", "product_img");

                    $ext = explode(".", $_FILES['imagen']['name'][$i]);
                    $name_img = $id_img . '-' . $name;
                    $ruta_temp = $_FILES['imagen']['tmp_name'][$i];
                    $ruta_img = 'img/product/' . $name_img . '.' . end($ext);

                    if (move_uploaded_file($ruta_temp, $ruta_img)) {
                        $ruta_imagen = $ruta_img;
                    } else {
                        $ruta_imagen = null;
                    }

                    $this->objProduct->create(
                        "product_img",
                        false,
                        "$id_img,'" . $name_img . "','" . $ruta_imagen . "'," . $id
                    );
                }
            }
            $this->consult();
        } else {
            echo "No llegaron los datos para Modificar";
        }

    }

    function getDelete()
    {
        include_once '../View/Product/delete.php';
    }

    function delete()
    {
        if (isset($_POST['id'])) {

            $id = $_POST['id'];
            $this->objProduct->delete("product", "pro_id=$id");
            $this->consult();
        } else {
            echo "No llegaron datos para Eliminar";
        }
    }

    public function filter()
    {

        if (isset($_GET['buscar'])) {

            $buscar = $_GET['buscar'];
            $Product = $this->objProduct->consult("*", "Product", "prov_nit LIKE '%$buscar%' or prov_name LIKE '%$buscar%'");
            include_once '../View/Product/filter.php';
            $this->objProduct->close();
        } else {
            echo "No llegaron datos para filtar";
        }
    }
}
