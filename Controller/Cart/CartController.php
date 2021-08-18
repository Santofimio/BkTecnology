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

                $cart_id = $this->objCart->autoIncrement("cart_id","cart");
                $this->objCart->create("cart", "cart_id,user_id","'$cart_id ','$user_id'");
                $cart = $this->objCart->consult("*", "cart", "user_id='$user_id'");
                
            }

            if (isset($_POST['id'])) {

                $pro_id = $_POST['id'];
                $cant = 1;

                foreach ($cart as $c) {
                    $cart_det = $this->objCart->autoIncrement("cart_det_id","cart_detail");
                    $this->objCart->create("cart_detail", "cart_det_id,cart_id,pro_id,quantity","'$cart_det','".$c['cart_id']."','$pro_id',$cant");
                    $cart_id = $c['cart_id'];
                }

                $cont_cart = $this->objCart->consult("*","cart_detail","cart_id='$cart_id'");

                $_SESSION['cart'] = mysqli_num_rows($cont_cart);
                echo mysqli_num_rows($cont_cart);
                
            }else{
                echo "No llego el codigo del producto";
            }


        }else{
            echo "login.php";
        }
    }
}
