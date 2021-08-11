<?php

include_once "../Lib/helpers.php";
include_once "../Lib/helperslogin.php";
include_once "../View/PartialsAdmin/head.php";

// echo "<div id='container-master' >";


include_once "../View/PartialsAdmin/menu.php";
include_once "../View/PartialsAdmin/header.php";


echo "<div class='pc-container bg-secondary bg-gradient'>";
echo "<div class='pcoded-content' id='container'>";
// echo "<div id='container'>";
        

        if (isset($_GET['modulo'])) {
            loadForms();
        }else{
            include_once "../View/PartialsAdmin/carrousel.php";
        }
        echo "</div>";
        echo "</div>";
include_once "../View/PartialsAdmin/footer.php";


