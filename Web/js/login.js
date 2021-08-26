function login() {
    
    var email = document.getElementById("email").value;
    var pass = document.getElementById("pass").value;
    var url = `fecth.php?modulo=Auth&controlador=Auth&funcion=login`;
    const datos = new FormData;
    datos.append("email", email);
    datos.append("pass", pass);

    fetch(url,{ method: "POST",body: datos,})
    .then(function (response) {
        return response.text();
    })
    .then(function (data) {
        console.log(data);
        window.location.href=data;
    })
    .catch(function (error) {
        console.log(error)
        
    })
}

function getRegistro() {
    
    var form = document.getElementById("csr");
    var p = form.parentNode;
    p.removeChild(form);

    var form = `<div class='login-box'>
                            <h2>Registrate</h2>
                            <form id='registro'>
                                <div class='user-box'>
                                    <input type='text' name='name' id='name' value='' required=''>
                                    <label>Nombres</label>
                                </div>
                                <div class='user-box'>
                                    <input type='text' name='last_name' id='last_name' value='' required=''>
                                    <label>Apellidos</label>
                                </div>
                                <div class='user-box'>
                                    <input type='text' name='email' id='email'  value='' required=''>
                                    <label>Email</label>
                                </div>
                                <div class='user-box'>
                                    <input type='password' name='pass' id='pass' value='' required=''>
                                    <label>Contraseña</label>
                                </div>
                                <div class='user-box'>
                                    <input type='password' id='pass2' value='' required=''>
                                    <label>Repite Tu Contraseña</label>
                                </div>
                                <a class='link tex-cen' onclick='registro()' >
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    Registrarse
                                </a>
                            </form>
                        </div>`;

    p.innerHTML = form;
    
    
}

function registro() {
    
    var url = `fecth.php?modulo=User&controlador=User&funcion=create`;
    var form = document.getElementById('registro');
    const datos = new FormData(form);

    fetch(url,{ method: "POST",body: datos,})
    .then(function (response) {
        return response.text();
    })
    .then(function (data) {
        console.log(data);
        window.location.href=data;
    })
    .catch(function (error) {
        console.log(error)
        
    })
}