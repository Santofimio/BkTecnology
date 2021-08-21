<?php
include_once '../Model/Mark/MarkModel.php';

class MarkController
{

    private $objMark;

    public function __construct()
    {
        $this->objMark = new MarkModel();
    }

    public function getCreate()
    {
        include_once '../View/Mark/create.php';
    }

    public function create()
    {
        if (isset($_POST)) {

            $name = $_POST['name'];

            $id = $this->objMark->autoIncrement("mark_id", "mark");

            if (isset($_FILES['log']['name'])) {
                $ext = explode(".", $_FILES['log']['name']);
                $name_img = $id . '-' . $name;
                $ruta_temp = $_FILES['log']['tmp_name'];
                $ruta_img = 'img/mark/' . $name_img . '.' . end($ext);

                if (move_uploaded_file($ruta_temp, $ruta_img)) {
                    $log = $ruta_img;
                } else {
                    $log = null;
                }
            } else {
                $log = null;
            }



            $this->objMark->create("Mark", false, "$id,'$name','$log'");
            $this->consult();
        } else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consult()
    {

        $mark = $this->objMark->consult("*", "mark");
        $this->objMark->close();
        include_once '../View/Mark/consult.php';
    }

    function getUpdate()
    {
        if (isset($_GET)) {

            $id = $_GET['id'];
            $mark = $this->objMark->consult("*", "mark", "mark_id=$id");
            $m = mysqli_fetch_assoc($mark);
            $this->objMark->close();
            include_once '../View/Mark/update.php';
        }
    }

    function update()
    {
        if (isset($_POST)) {

            $id = $_POST['id'];
            $name = $_POST['name'];
            $log_old = $_POST['log_old'];

            if ($_FILES['log']['tmp_name']) {
                $ext = explode(".", $_FILES['log']['name']);
                $name_img = $id . '-' . $name;
                $ruta_temp = $_FILES['log']['tmp_name'];
                $ruta_img = 'img/mark/' . $name_img . '.' . end($ext);

                if (move_uploaded_file($ruta_temp, $ruta_img)) {
                    $log = $ruta_img;
                }
            } else {
                $log = $log_old;
            }

            $this->objMark->update(
                "mark",
                "mark_id='$id'",
                array(
                    "mark_name" => "'$name'",
                    "mark_log" => "'$log'"
                )
            );

            // $this->consult();
            
        } else {
            echo "No llegaron datos para Editar";
        }
    }

    function getDelete()
    {
        include_once '../View/Mark/delete.php';
    }

    function delete()
    {
        if (isset($_POST['id'])) {

            $id = $_POST['id'];
            $this->objMark->delete("Mark", "mark_id=$id");
            $this->consult();
        } else {
            echo "No llegaron datos para Eliminar";
        }
    }

    public function filter()
    {

        if (isset($_GET['buscar'])) {

            $buscar = $_GET['buscar'];
            $mark = $this->objMark->consult("*", "mark", "mark_name LIKE '%$buscar%'");
            include_once '../View/Mark/filter.php';
            $this->objMark->close();
        } else {
            echo "No llegaron datos para filtar";
        }
    }
}
