<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>factura</title>
  <link rel="stylesheet" href="assets/assets_invoice/css/main.css">
</head>

<body onload="loadInvoice()">
  <div class="control-bar">
    <div class="container">
      <div class="row">
        <div class="col text-right">
          <a href="javascript:window.print()">Imprimir</a>
        </div>
        <!--.col-->
      </div>
      <!--.row-->
    </div>
    <!--.container-->
  </div>
  <!--.control-bar-->
  <header>
    <div class="row">
      <div class="col">
        <img src="img/log.png" width="150px" height="50px">
      </div>
    </div>
  </header>




  <div class="row section">

    <div class="col-2">
      <h1>Factura</h1>
    </div>
    <!--.col-->

    <div class="col-2 text-right">
      Fecha: <input type="text" class="" id="date" readonly/><br>
      Factura #: <input type="text" value="" id="inv_id" readonly /><br>
    </div>
    <!--.col-->



    <div class="col-2">


      <p class="client">
        <strong>Facturar a</strong><br>
        Nombre cliente<br>
        Nombre emmpresa<br>
        Dirección empresa<br>
        Tel empresa
      </p>
    </div>
    <!--.col-->


  </div>

  <div class="invoicelist-body">
    <table>
      <thead>
        <th width="5%">Código</th>
        <th width="60%">Descripción</th>

        <th width="10%">Cant.</th>
        <th width="15%">Precio</th>
        <th class="taxrelated">IVA</th>
        <th width="10%">Total</th>
      </thead>
      <tbody>
        <tr>
          <td width='5%'> <span>12345</span></td>
          <td width='60%'><span>Descripción</span></td>
          <td class="amount"><input type="text" value="1" /></td>
          <td class="rate"><input type="text" value="99" /></td>
          <td class="tax taxrelated"></td>
          <td class="sum"></td>
        </tr>
      </tbody>
    </table>
  </div>
  <!--.invoice-body-->

  <div class="invoicelist-footer">
    <table>
      <tr class="taxrelated">
        <td>IVA:</td>
        <td id="total_tax"></td>
      </tr>
      <tr>
        <td><strong>Total:</strong></td>
        <td id="total_price"></td>
      </tr>
    </table>
  </div>

  <footer class="row">
    <div class="col-1 text-center">
      <p>
        <strong>Bk-Tecnology</strong><br>
        calle 100 # 13-70<br>
        Cali-valle del Cauca.<br>
      </p>
    </div>
  </footer>
  <script src="js/invoice.js"></script>
</body>

</html>