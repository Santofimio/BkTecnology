function pasarPk(tbl, pk, nombre) {
    modal = `<div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'>
                            Esta seguro de eliminar ${tbl} ${nombre}
                            </h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-footer' id='container-button'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                        <a href='index.php?modulo=${tbl}&controlador=${tbl}&funcion=eliminar&id="${pk}"'>
                        <button type='button' class='btn btn-danger'>Eliminar</button></a>
                        </div>
                    </div>
                </div>
            </div>`;
    document.getElementById("mdl").innerHTML = modal;
}

function filtar(tbl) {

    var buscar = document.getElementById("buscar").value;
    var url = `ajax.php?modulo=${tbl}&controlador=${tbl}&funcion=filtrar`;
    const datos = new FormData;
    datos.append("buscar", buscar);

    console.log(url);

    fetch(url, { method: "POST", body: datos, })
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {
            // console.log(data);
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

function fModal(tbl,fun,id=false) {

    var url = `ajax.php?modulo=${tbl}&controlador=${tbl}&funcion=get${fun}&m=true&id=${id}`;
    modal = `<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" </div>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">${fun} ${tbl}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="mBody" class="container">
                    </div>
                </div>
            </div>>
        </div>`;
    document.getElementById("mdl").innerHTML = modal;


    fetch(url, { method: "POST" })
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
