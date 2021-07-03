function inicioSesion() {
    
    var id = document.getElementById("id").value;
    var pass = document.getElementById("pass").value;
    var url = `ajax.php?modulo=Access&controlador=Access&funcion=login`;
    const datos = new FormData;
    datos.append("id", id);
    datos.append("pass", pass);

    fetch(url,{ method: "POST",body: datos,})
    .then(function (response) {
        return response.text();
    })
    .then(function (data) {
        window.location.href=data;
    })
    .catch(function (error) {
        console.log(error)
        
    })
}