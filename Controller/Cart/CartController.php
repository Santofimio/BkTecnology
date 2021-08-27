<?php
include_once '../Model/Cart/CartModel.php';
@session_start();
class CartController
{

    private $objCart;

    public function __construct()
    {
        $this->objCart = new CartModel();
    }

    public function addCart()
    {

        if (isset($_SESSION['id'])) {
            $user_id = $_SESSION['id'];

            $cart = $this->objCart->consult("*", "cart", "user_id='$user_id'");

            if (mysqli_num_rows($cart) == 0) {

                $cart_id = $this->objCart->autoIncrement("cart_id", "cart");
                $this->objCart->create("cart", "cart_id,user_id", "'$cart_id ','$user_id'");
                $cart = $this->objCart->consult("*", "cart", "user_id='$user_id'");
            }else{
                foreach ($cart as $ct) {
                    $cart_id = $ct['cart_id'];
                }
            }

            if (isset($_POST['id'])) {

                $pro_id = $_POST['id'];
                $cant = $_POST['cant'];

                
                $cont_cart = $this->objCart->consult("*", "cart_detail", "pro_id='$pro_id'");

                

                if (mysqli_num_rows($cont_cart) <= 1) {

                    foreach ($cart as $c) {
                        $cart_det = $this->objCart->autoIncrement("cart_det_id", "cart_detail");
                        $this->objCart->create("cart_detail", "cart_det_id,cart_id,pro_id,quantity", "'$cart_det','" . $c['cart_id'] . "','$pro_id',$cant");
                        $cart_id = $c['cart_id'];
                    }
                    
                }else{
                    // echo mysqli_num_rows($cont_cart);

                    foreach ($cont_cart as $c) {
                        $quantity = $c['quantity']+$cant;
                    }
                    $this->objCart->update(
                        "cart_detail",
                        "pro_id='$pro_id'",
                        array(
                        "quantity"=>"'$quantity'"));
                }
                

                $cont = $this->objCart->consult("*", "cart_detail", "cart_id='$cart_id'");

                $_SESSION['cart'] = mysqli_num_rows($cont);
                echo $_SESSION['cart'];
            } else {
                echo "No llego el codigo del producto";
            }
        } else {
            echo "login.php";
        }
    }

    public function getCart()
    {
        if (isset($_SESSION['id'])) {
            $user_id = $_SESSION['id'];
            $cart = $this->objCart->consult("*", "cart", "user_id='$user_id'");

            foreach ($cart as $c) {
                $products = $this->objCart->consult("p.pro_id,p.pro_name,p.pro_price,cat_sub_name,mark_log,cd.cart_det_id,cd.quantity", "product p,cart_detail cd,mark m,category_sub cs", "cd.pro_id=p.pro_id AND m.mark_id=p.mark_id AND cs.cat_sub_id=p.cat_sub_id AND cd.cart_id='" . $c['cart_id'] . "'");
                // $cart_detail = $this->objCart->consult("*","cart_detail","cart_id=".$c['cart_id']);

            }
            // foreach ($cart_detail  as $cd) {}
            include_once '../View/Partials/cart.php';
        } else {
            echo "No hay usuario";
        }
    }

    public function deleteCart()
    {

        if (isset($_POST['pro_id'])) {

            $pro_id = $_POST['pro_id'];

            if (isset($_SESSION['id'])) {
                $user_id = $_SESSION['id'];
                $cart = $this->objCart->consult("*", "cart", "user_id='$user_id'");
                foreach ($cart as $c) {}
                $this->objCart->delete("cart_detail", "cart_id='" . $c['cart_id'] . "' and pro_id='" . $pro_id . "'");
                $cont_cart = $this->objCart->consult("cd.cart_det_id,cd.quantity,p.pro_id,p.pro_price", "cart_detail cd, product p", "cd.pro_id=p.pro_id and cart_id='" . $c['cart_id'] . "'");
                $total = 0;
                foreach ($cont_cart as $c) {
                    $price = $c['pro_price']*$c['quantity'];
                    $total = $total + $price;
                }
                
                $_SESSION['cart'] = mysqli_num_rows($cont_cart);
                $cont_cart = $_SESSION['cart'];



                $col = array();
                $col = [
                    "cont_cart" => "$cont_cart",
                    "total" => "$total"
                ];
                $myObj = new \stdClass();
                $myObj->info = $col;
                $myJSON = json_encode($myObj);
                return print_r($myJSON);
            }
        
        } else {
            echo "No llegaron datos para Eliminar";
        }
    }
}
