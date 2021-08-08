<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Bk-Inicio Sesión</title>
<body>
    <div class="login-box">
        <h2>Inicio De Sesión</h2>
        <form id="sesion" >
          <div class="user-box">
            <input type="text" name="email" id="email"  value="" required="">
            <label>Email</label>
          </div>
          <div class="user-box">
            <input type="password" name="pass" id="pass" value="" required="">
            <label>Contraseña</label>
          </div>
          <a onclick="login()" >
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Entrar
          </a>
        </form>
      </div>
      <script src="js/login.js"></script>
</body>
</html>