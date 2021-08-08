<?php
@session_start();

if (!isset($_SESSION['auth'])) {

    redirect("login.php");
}