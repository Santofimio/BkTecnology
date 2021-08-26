<?php
include_once '../Model/User/UserModel.php';

class UserController {

    private $objUser;

	public function __construct()
	{
		$this->objUser = New UserModel();
	}

    public function getCreate()
    {
        $role = $this->objUser->consult("*","role");
        include_once '../View/User/create.php';
    }

    public function create()
    {
        if(isset($_POST)){

            if(isset($_SESSION['auth'])){
                if($_SESSION['rol_id'] === 1){
                    $pass = md5("123456");
                    $rol = $_POST['rol'];
                }else{
                    echo "login.php";
                }
            }else{
                $pass = md5($_POST['pass']);
                $rol = 3;
            }

            $name = $_POST['name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $status = 1;
            
            $id = $this->objUser->autoIncrement("user_id","user");
            $this->objUser->create("user","user_id,user_name,user_last_name,user_email,user_pass,rol_id,sta_id","$id,'$name','$last_name','$email','$pass',$rol,$status");
            
            if ($rol === 3) {
                $cart_id = $this->objUser->autoIncrement("cart_id", "cart");
                $this->objUser->create("cart", "cart_id,user_id", "'$cart_id ','$id'");
                echo "login.php";
            }else{
                $this->consult();
            }
            
            

        }else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consult()
    {
        
        $user = $this->objUser->consult("u.user_id, u.user_name, u.user_last_name, u.user_email,r.rol_name,s.sta_id,s.sta_name", "user u, role r, status s", "u.rol_id=r.rol_id AND u.sta_id=s.sta_id");
        $this->objUser->close();
        include_once '../View/User/consult.php';
    }

    function getUpdate()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $role = $this->objUser->consult("*","role");
            $user = $this->objUser->consult("*","user","user_id=$id");
            $u=mysqli_fetch_assoc($user);
            $this->objUser->close();
            include_once '../View/User/update.php';
        }
    }

    function update()
    {
        if(isset($_POST)){

            if(!isset($_POST['rol'])){
                $rol = 3;
            }else{
                $rol = $_POST['rol'];
            }
            
            $id = $_POST['id'];
            $name = $_POST['name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];

            $this->objUser->update(
                "user",
                "user_id=$id",
                array(
                "user_name"=>"'$name'",
                "user_last_name"=>"'$last_name'",
                "user_email"=>"'$email'",
                "rol_id"=>"$rol"));
            $this->consult();
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    function getDelete()
    {
        include_once '../View/User/delete.php';
    }

    function delete()
    {
        if(isset($_POST['id'])){

            $id = $_POST['id'];
            $this->objUser->update(
                "user",
                "user_id=$id",
                array(
                "sta_id"=>"2"));
            $this->consult();
            
        }else {
                echo "No llegaron datos para Desactivar";
        }
    }

    public function filter()
    {

        if(isset($_GET['buscar'])){

            $buscar = $_GET['buscar'];
            $user = $this->objUser->consult("u.user_id, u.user_name, u.user_last_name, u.user_email,r.rol_name,s.sta_id,s.sta_name", "user u, role r, status s", "u.rol_id=r.rol_id AND u.sta_id=s.sta_id and (user_name LIKE '%$buscar%' or user_last_name LIKE '%$buscar%' or user_email LIKE '%$buscar%')");
            include_once '../View/User/filter.php';
            $this->objUser->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
