<?php

include_once "../Lib/helpers.php";
include_once "../Lib/helperslogin.php";
include_once "../View/Partials/head.php";

// echo "<div id='container-master' >";


include_once "../View/Partials/menu.php";
include_once "../View/Partials/header.php";


echo "<div class='pc-container bg-secondary bg-gradient'>";
echo "<div class='pcoded-content' id='container'>";
// echo "<div id='container'>";
        

        if (isset($_GET['modulo'])) {
            loadForms();
        }else{
            include_once "../View/Partials/carrousel.php";
        }
        echo "</div>";
        echo "</div>";
include_once "../View/Partials/footer.php";


