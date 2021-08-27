<?php


if (!isset($_SESSION['auth'])) {
    redirect("login.php");
}if ($_SESSION['rol_id'] !== "1" and $_SESSION['rol_id'] !== "2") {

        redirect("index.php");
}
