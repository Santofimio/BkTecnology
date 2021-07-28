function fModal(tbl, fun, title, id = false) {

    var url = `fecth.php?modulo=${tbl}&controlador=${tbl}&funcion=get${fun}&id=${id}`;
    var modal = `<div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">${title}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="mBody" class="container">
                    </div>
                </div>`;
    document.getElementById("mdl").innerHTML = modal;

    fetch(url)
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {
            document.getElementById("mBody").innerHTML = data;
        })
        .catch(function (error) {
            console.log(error);
        });
}

function loadData(tbl, fun) {

    var datos;

    if (fun === 'create' || fun === 'update' || fun === 'delete') {
        var datos = new FormData(document.getElementById(`form`));
    }

    var url = `fecth.php?modulo=${tbl}&controlador=${tbl}&funcion=${fun}`;
    fetch(url, {
        method: "POST",
        body: datos,
    })
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {

            var container = document.getElementById('container');
            container.innerHTML = data;
        })
        .catch(function (error) {
            console.log(error);
        });
}

function filtar(tbl) {

    var buscar = document.getElementById("buscar").value;
    var url = `fecth.php?modulo=${tbl}&controlador=${tbl}&funcion=filter&buscar=${buscar}`;

    fetch(url)
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {
            var tbl = document.getElementById('tbody');
            tbl.innerHTML = data;
        })
        .catch(function (error) {
            console.log(error);
        });
}


function cboImg() {
    var ruta = document.getElementById('c_img').src;
    // alert(ruta);
    document.getElementById('cambiarImagen').innerHTML = "<input type='file' name='img'>";
}


function sh(div) {

    var div = document.getElementById(div);
    var clase = div.getAttribute('class');
    console.log(clase);
    if (clase === 'collapse') {
        div.className = '';

    } else {
        div.className = 'collapse';
    }
}

function select(div) {
    var items = document.getElementsByClassName('nav-link active');
    items[0].className = 'nav-link';
    div.className = 'nav-link active';
}

function sd(tbl,id,idp) {

    var id = document.getElementById(`${id}`).value;
    var idp = document.getElementById(`${idp}`);

    console.log(id);
    console.log(idp);

    const datos = new FormData();
    datos.append('id',id)

    var url = `fecth.php?modulo=${tbl}&controlador=${tbl}&funcion=select`;
    console.log(url);
    
    fetch(url, {
        method: "POST",
        body: datos,
    })
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {

            
            idp.innerHTML = data;
        })
        .catch(function (error) {
            console.log(error);
        });
}


// document.getElementById('item').addEventListener('click', function () {

//     this.className = 'nav-link active';

// }  , false);

