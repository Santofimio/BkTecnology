<?php
include_once '../Model/Auth/AuthModel.php';
@session_start();
class AuthController
{

    private $objAuth;

    public function __construct()
    {
        $this->objAuth = new AuthModel();
    }

    public function login()
    {
        if (isset($_POST['email']) && isset($_POST['pass'])) {

            if ($_POST['email'] == "" or $_POST['pass'] == "") {
                $_SESSION['msm'] = "<div class='alert alert-danger mt-2' role='alert'>
                    llena los campos*
                    </div>";
                    echo 'login.php';
            } else {
                $email = $_POST['email'];
                // $pass = $_POST['pass'];

                $pass = md5($_POST['pass']);


                $user = $this->objAuth->consult("user_id, user_name, user_last_name ,rol_id,user_email", "user", "user_email='$email' AND user_pass='$pass'");



                if (mysqli_num_rows($user) > 0) {

                    foreach ($user as $u) {
                        $_SESSION['id'] = $u['user_id'];
                        $_SESSION['nombre'] = $u['user_name'];
                        $_SESSION['apellido'] = $u['user_last_name'];
                        $_SESSION['rol_id'] = $u['rol_id'];
                        $_SESSION['email'] = $u['user_email'];
                        $_SESSION['auth'] = true;
                        $rol = $this->objAuth->consult("*", "role", "rol_id='" . $u['rol_id'] . "'");
                        $r = mysqli_fetch_assoc($rol);
                        $_SESSION['rol'] = $r['rol_name'];
                        $cart = $this->objAuth->consult("*", "cart", "user_id='" . $u['user_id'] . "'");
                        $c = mysqli_fetch_assoc($cart);
                        $cont_cart = $this->objAuth->consult("*", "cart_detail", "cart_id='" . $c['cart_id'] . "'");
                        $_SESSION['cart'] = mysqli_num_rows($cont_cart);
                    }


                    $this->objAuth->close();
                    // echo $_SESSION['rol_id'];
                    if ($_SESSION['rol_id'] == "1" || $_SESSION['rol_id'] == "2") {
                        echo "admin.php";
                    } else {
                        echo "index.php";
                    }
                } else {
                    $_SESSION['msm'] = "<div class='alert alert-danger mt-2' role='alert'>
                            Correo electronico o Contraseña incorrecta
                            </div>";
                    echo "login.php";
                    
                }
            }
        }
    }

    public function cerrarSesion()
    {
        @session_start();
        // unset($_SESSION);
        session_destroy();
        redirect("index.php");
    }



    public function checkMail()
    {
        if (isset($_POST)) {

            $email = $_POST['email'];

            $user = $this->objAuth->consult("user_id, user_name, user_last_name ,rol_id", "user", "user_email='$email'");

            if (mysqli_num_rows($user) > 0) {

                return true;
            } else {

                return false;
            }
        }
    }
}
