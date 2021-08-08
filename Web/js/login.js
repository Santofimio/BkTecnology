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