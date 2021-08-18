function loadIndex() {

    var url = `fecth.php?modulo=Product&controlador=Product&funcion=productIndex`;
    fetch(url)
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {

            var container = document.getElementById('products');
            container.innerHTML = data;
        })
        .catch(function (error) {
            console.log(error);
        });
}

function getProduct(id) {

    const datos = new FormData();
    datos.append('id', id)
    var url = `fecth.php?modulo=Product&controlador=Product&funcion=getProduct`;
    fetch(url, {
        method: "POST",
        body: datos,
    })
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {

            var container = document.getElementById('contents');
            container.innerHTML = data;
        })
        .catch(function (error) {
            console.log(error);
        });
}

function addCart(id) {
    const datos = new FormData();
    datos.append('id', id)
    var url = `fecth.php?modulo=Cart&controlador=Cart&funcion=addCart`;
    fetch(url, {
        method: "POST",
        body: datos,
    })
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {

            if(data === "login.php"){
                window.location.href=data;
            }else{
                var container_counter = document.getElementById('counter');
                container_counter.innerHTML = data;
                
            }
            
        })
        .catch(function (error) {
            console.log(error);
        });
}