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
        $mark = $this->objProduct->consult("*", "mark");
        include_once '../View/Product/create.php';
    }

    public function create()
    {
        if (isset($_POST)) {

            $name = $_POST['name'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $summary = $_POST['summary'];
            $cat_sub = $_POST['categorySub'];
            $provider = $_POST['provider'];
            $mark = $_POST['mark'];

            $id = $this->objProduct->autoIncrement("pro_id", "product");
            $this->objProduct->create("product", false, "$id,'$name','$summary',$price,$stock,$cat_sub,$provider,$mark,4");

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
                    $name_img = "product-$id-" . $id_img;
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
        $product = $this->objProduct->consult("p.pro_id,p.pro_name,p.pro_summary,p.pro_price,c.cat_sub_name,pv.prov_name", "product p, category_sub c, provider pv", "p.cat_sub_id=c.cat_sub_id AND p.prov_id=pv.prov_id AND p.sta_id=4");
        $this->objProduct->close();
        include_once '../View/Product/consult.php';
    }

    function getUpdate()
    {
        if (isset($_GET)) {

            $id = $_GET['id'];
            $provider = $this->objProduct->consult("*", "provider");
            $category = $this->objProduct->consult("*", "category");
            $mark = $this->objProduct->consult("*", "mark");
            $cat_sub = $this->objProduct->consult("cs.cat_sub_id, cs.cat_sub_name, c.cat_id, c.cat_name", "category_sub cs, category c, product p", "cs.cat_id=c.cat_id AND p.cat_sub_id=cs.cat_sub_id AND p.pro_id=$id");
            $cs = mysqli_fetch_assoc($cat_sub);
            $category_sub = $this->objProduct->consult("*", "category_sub", "cat_id=" . $cs['cat_id'] . "");
            $specifications = $this->objProduct->consult("pro_spe_id,pro_spe_description,spe_name,spe_tip_name", "product_specification ps,specification s,specification_type st", "ps.spe_id=s.spe_id AND s.spe_tip_id=st.spe_tip_id AND ps.pro_id=$id ");
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
            $stock = $_POST['stock'];
            $summary = $_POST['summary'];
            $cat_sub = $_POST['categorySub'];
            $provider = $_POST['provider'];
            $mark = $_POST['mark'];

            $this->objProduct->update(
                "Product",
                "pro_id='$id'",
                array(
                    "pro_name" => "'$name '",
                    "pro_price" => "'$price'",
                    "pro_stock" => "'$stock'",
                    "pro_summary" => "'$summary'",
                    "cat_sub_id" => "'$cat_sub'",
                    "prov_id" => "'$provider'",
                    "mark_id" => "'$mark'"
                )
            );
            // echo "<h1 class='bg-red'>".$_POST['specification'][0]."</h1>";
            if (isset($_POST['specification']) and $_POST['specification'][0] !== "Seleccione...") {


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


            if (isset($_FILES['imagen']) and $_FILES['imagen']['name'][0] !== "") {

                for ($i = 0; $i < count($_FILES['imagen']['name']); $i++) {

                    $id_img = $this->objProduct->autoIncrement("pro_img_id", "product_img");

                    $ext = explode(".", $_FILES['imagen']['name'][$i]);
                    $name_img = "product-$id-" . $id_img;
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
            // $this->objProduct->delete("product", "pro_id=$id");
            $this->objProduct->update(
                "product",
                "pro_id='$id'",
                array("sta_id" => "'5'")
            );
            $this->consult();
        } else {
            echo "No llegaron datos para Eliminar";
        }
    }

    public function deleteItem()
    {
        if (isset($_POST['id'])) {

            $id = $_POST['id'];

            if ($_POST['tbl'] === 'pro_spe') {
                $tbl = 'product_specification';
                $idTbl = $_POST['tbl'] . "_id";
            } else if ($_POST['tbl'] === 'pro_img') {
                $tbl = 'product_img';
                $idTbl = $_POST['tbl'] . "_id";
            }

            $this->objProduct->delete("$tbl", "$idTbl=$id");
        } else {
            echo "No llegaron datos para Eliminar";
        }
    }

    public function filter()
    {

        if (isset($_GET['buscar'])) {

            $buscar = $_GET['buscar'];
            $product = $this->objProduct->consult("p.pro_id,p.pro_name,p.pro_summary,p.pro_price,c.cat_sub_name,pv.prov_name", "product p, category_sub c, provider pv", "p.cat_sub_id=c.cat_sub_id AND p.prov_id=pv.prov_id AND p.sta_id=4 AND pro_name LIKE '%$buscar%' or cat_sub_name LIKE '%$buscar%'");
            include_once '../View/Product/filter.php';
            $this->objProduct->close();
        } else {
            echo "No llegaron datos para filtar";
        }
    }

    public function productIndex()
    {
        $computadores = $this->objProduct->consult("p.pro_id,p.pro_name,p.pro_summary,p.pro_price,c.cat_sub_name,m.mark_name,m.mark_log", "product p, category_sub c, mark m", "p.cat_sub_id=c.cat_sub_id AND p.mark_id=m.mark_id AND c.cat_id=1 AND p.sta_id=4 ORDER by pro_id LIMIT 3");
        $celulares = $this->objProduct->consult("p.pro_id,p.pro_name,p.pro_summary,p.pro_price,c.cat_sub_name,m.mark_name,m.mark_log", "product p, category_sub c, mark m", "p.cat_sub_id=c.cat_sub_id AND p.mark_id=m.mark_id AND c.cat_id=2 AND p.sta_id=4 ORDER by pro_id LIMIT 3");
        $audio = $this->objProduct->consult("p.pro_id,p.pro_name,p.pro_summary,p.pro_price,c.cat_sub_name,m.mark_name,m.mark_log", "product p, category_sub c, mark m", "p.cat_sub_id=c.cat_sub_id AND p.mark_id=m.mark_id AND c.cat_id=3 AND p.sta_id=4 ORDER by pro_id LIMIT 3");
        $video = $this->objProduct->consult("p.pro_id,p.pro_name,p.pro_summary,p.pro_price,c.cat_sub_name,m.mark_name,m.mark_log", "product p, category_sub c, mark m", "p.cat_sub_id=c.cat_sub_id AND p.mark_id=m.mark_id AND c.cat_id=4 AND p.sta_id=4 ORDER by pro_id LIMIT 3");
        $hogar = $this->objProduct->consult("p.pro_id,p.pro_name,p.pro_summary,p.pro_price,c.cat_sub_name,m.mark_name,m.mark_log", "product p, category_sub c, mark m", "p.cat_sub_id=c.cat_sub_id AND p.mark_id=m.mark_id AND c.cat_id=5 AND p.sta_id=4 ORDER by pro_id LIMIT 3");


        include_once '../View/Partials/product.php';
        $this->objProduct->close();
    }

    public function getProduct()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $product = $this->objProduct->consult("p.pro_id,p.pro_name,p.pro_summary,p.pro_price,cs.cat_sub_name,c.cat_name, m.mark_name,m.mark_log", "product p, category_sub cs, category c, mark m", "p.cat_sub_id=cs.cat_sub_id AND cs.cat_id=c.cat_id AND p.mark_id=m.mark_id AND p.pro_id=$id AND p.sta_id=4");
            $pro = mysqli_fetch_assoc($product);
            $specifications = $this->objProduct->consult("pro_spe_id,pro_spe_description,spe_name,st.spe_tip_name,st.spe_tip_id", "product_specification ps,specification s,specification_type st", "ps.spe_id=s.spe_id AND s.spe_tip_id=st.spe_tip_id AND ps.pro_id=$id ");
            $product_img = $this->objProduct->consult("*", "product_img", "pro_id=$id");
            $specificationType = $this->objProduct->consult("*", "specification_type");

            $cont = 0;
            $sp[0] = -1;

            foreach ($specifications as $s) {
                $sp[$cont] = $s['spe_tip_id'];
                $cont++;
            }
            $spe = array_values(array_unique($sp));
        } else {
            echo "No llegaron datos";
        }

        include_once '../View/Product/product.php';
    }

    public function getProductCat()
    {
        if (isset($_POST['cat'])) {
            $cat = $_POST['cat'];
            $cat_sub = $this->objProduct->consult("cs.cat_sub_id,cs.cat_sub_name,cs.cat_sub_img,c.cat_name", "category_sub cs,category c", "cs.cat_id=c.cat_id AND cs.cat_id=$cat");
            $cat = mysqli_fetch_assoc($cat_sub);
            include_once '../View/Partials/category.php';
        } else {
            echo "No llegaron datos";
        }
    }

    public function getProductCatSub()
    {
        if (isset($_POST['cat_sub'])) {
            $cat_sub = $_POST['cat_sub'];
            $products = $this->objProduct->consult("p.pro_id,p.pro_name,p.pro_summary,p.pro_price,cs.cat_sub_name,c.cat_name, m.mark_name,m.mark_log", "product p, category_sub cs, category c, mark m", "p.cat_sub_id=cs.cat_sub_id AND cs.cat_id=c.cat_id AND p.mark_id=m.mark_id AND p.cat_sub_id=$cat_sub AND p.sta_id=4");
            $cat_sub = $this->objProduct->consult("c.cat_name, cs.cat_sub_name", "category_sub cs, category c", "c.cat_id=cs.cat_id AND cs.cat_sub_id=$cat_sub");
            foreach ($cat_sub as $cs) {}
            // $specifications = $this->objProduct->consult("pro_spe_id,pro_spe_description,spe_name,st.spe_tip_name,st.spe_tip_id", "product_specification ps,specification s,specification_type st", "ps.spe_id=s.spe_id AND s.spe_tip_id=st.spe_tip_id AND ps.pro_id=$id ");
            // $product_img = $this->objProduct->consult("*", "product_img", "pro_id=$id");
            // $specificationType = $this->objProduct->consult("*", "specification_type");

            // $cont = 0;
            // $sp[0] = -1;

            // foreach ($specifications as $s) {
            //     $sp[$cont] = $s['spe_tip_id'];
            //     $cont++;
            // }
            // $spe = array_values(array_unique($sp));

            include_once '../View/Partials/category_sub.php';


        } else {
            echo "No llegaron datos";
        }

        
    }
}
