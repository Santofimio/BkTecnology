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

function loadData(tbl, fun,id=false) {

    var datos;

    if (fun === 'create' || fun === 'update' || fun === 'delete') {
        var datos = new FormData(document.getElementById(`form`));
    }

    var url = `fecth.php?modulo=${tbl}&controlador=${tbl}&funcion=${fun}&id=${id}`;
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

function sd(tbl,id,idp) {

    var id = document.getElementById(`${id}`).value;
    var idp = document.getElementById(`${idp}`);

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

function replica(rep,father) {
    
    f = document.getElementById(father);
    r = document.getElementById(rep);
    var nuevo=r.cloneNode(true);
    nuevo.style.display  = "flex";
    f.append(nuevo);
}

// product

function spe() {

    var url = `fecth.php?modulo=SpecificationType&controlador=SpecificationType&funcion=select`;
    var div = document.getElementById('container_spe');
    var num = div.childElementCount+1;
    
    fetch(url)
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {


        var string = `<table class="table"  id="nodeSpecification-${num}" >
                    <tr>
                        <td width="33%">
                            <select class="form-select" onchange="sd('Specification','specificationType-${num}','specification-${num}')" id="specificationType-${num}">
                                    <option>Seleccione...</option>
                                    ${data}
                            </select>
                        </td>
                        <td width="32%">
                            <select class="form-select" name="specification[]" id="specification-${num}">
                                <option>Seleccione...</option>
                            </select>
                        </td>
                        <td width="33%">
                            <input type="text" class="form-control" name="spe_description[]" required>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger float-end" onclick="nodeDelete('nodeSpecification-${num}','container_spe')">-</button>
                        </td>
                    </tr>
                    </table>`;
            string = crearTemplate(string);
            div.appendChild(string)
            // div.append(string);
            // div.textContent = string;
        })
        .catch(function (error) {
            console.log(error);
        });
}

function speImg(container) {
    var cont = document.getElementById(container);
    var num = cont.childElementCount+1;
    
    var str = `<div class="row" id="nodeImg-${num}" >
                    <div class="col-11">
                        <div class="form-group">
                            <input class="form-control" type="file" id="formFile" name="imagen[]">
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                        <button type="button" class="btn btn-danger float-end" onclick="nodeDelete('nodeImg-${num}','${container}')">-</button>
                        </div>
                    </div>
                </div>`;

    cont.append(crearTemplate(str));
}

function nodeDelete(Nodo,father){
    f = document.getElementById(father);
    n = document.getElementById(Nodo);
    f.removeChild(n);
}

function crearTemplate(htmlString) {
    const html = document.implementation.createHTMLDocument();
    html.body.innerHTML = htmlString;
    const secciones = html.body.children[0];
    return secciones;
}

