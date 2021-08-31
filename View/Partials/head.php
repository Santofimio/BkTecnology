<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Bk-Tecnology</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">



  <!-- Bootstrap core CSS -->
  <link href="bootstrap-5/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/index.css" rel="stylesheet">
  <link href="css/product.css" rel="stylesheet">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    
  </style>



</head>
<?php  
  if (isset($_GET['viewInvoice'])) {
    echo "<body onload='loadInvoice()' class='bg-body' id='body'>";
  }else{
    echo "<body onload='loadIndex()' class='bg-body'>";
  }
?>






