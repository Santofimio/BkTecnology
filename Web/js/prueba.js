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


// document.getElementById('item').addEventListener('click', function () {

//     this.className = 'nav-link active';

// }  , false);

var string = `<div class="row mt-3" id="nodeSpecification-${num}">
                            <div class="col-4">
                                <label for="">Tipo de Especificación</label>
                                <select class="form-select" onchange="sd('Specification','specificationType-${num}','specification-${num}')" id="specificationType-${num}">
                                    <div id="select-specification">
                                        <option>Seleccione...</option>
                                        ${data}
                                    </div>
                                </select>
                            </div>
                            <div class="col-4">
                                <label>Especificación</label>
                                <select class="form-select" name="specification[]" id="specification-${num}">
                                    <option>Seleccione...</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label>Descripción Especificación</label>
                                <input type="text" class="form-control" name="spe_description[]" required>
                            </div>
                            <div class="col-1">
                                <div>
                                    <button type="button" class="btn btn-danger float-end" onclick="nodeDelete()">-</button>
                                </div>
                            </div>
                        </div>`


                        {
                            "decimal":        "",
                            "emptyTable":     "No data available in table",
                            "info":           "Showing _START_ to _END_ of _TOTAL_ entries",
                            "infoEmpty":      "Showing 0 to 0 of 0 entries",
                            "infoFiltered":   "(filtered from _MAX_ total entries)",
                            "infoPostFix":    "",
                            "thousands":      ",",
                            "lengthMenu":     "Show _MENU_ entries",
                            "loadingRecords": "Loading...",
                            "processing":     "Processing...",
                            "search":         "Search:",
                            "zeroRecords":    "No matching records found",
                            "paginate": {
                                "first":      "First",
                                "last":       "Last",
                                "next":       "Next",
                                "previous":   "Previous"
                            },
                            "aria": {
                                "sortAscending":  ": activate to sort column ascending",
                                "sortDescending": ": activate to sort column descending"
                            }
                        }


                        
function checkMail() {
    var email = document.getElementById('email').value;
    var containerForm = document.getElementById('container-form');
    console.log(email);
    const datos = new FormData();
    datos.append('email', email)
    var url = `fecth.php?modulo=Auth&controlador=Auth&funcion=checkMail`;
    fetch(url, {
        method: "POST",
        body: datos,
    })
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {

            if(data == false){


                var dt = `<div class='row mt-2'>
                            <div class='col'>
                                <label for='pass' class='form-label'>Contraseña</label>
                                <input type='password' class='form-control' name='pass' id='pass'>
                            </div>
                            <div class='col'>
                                <label for='confirm_pass' class='form-label'>Confirme Contraseña</label>
                                <input type='password' class='form-control' name='confirm_pass' id='confirm_pass'>
                            </div>
                        </div>
                        <div class='row mt-2'>
                            <div class='col'>
                                <label for='name' class='form-label'>Nombres</label>
                                <input type='text' class='form-control' name='name' id='name' placeholder='Nombres'>
                            </div>
                            <div class='col'>
                                <label for='last_name' class='form-label'>Apellidos</label>
                                <input type='text' class='form-control' name='last_name' id='last_name' placeholder='Apellidos'>
                            </div>
                        </div>`;

                containerForm.innerHTML = dt;
                
            }if(data == true){

                var dt = `<div class='row mt-2'>
                            <label for='pass' class='form-label'>Contraseña</label>
                            <input type='password' class='form-control' name='pass' id='pass'>
                        </div>`;

                containerForm.innerHTML = dt;

            }else{
                console.log(data);
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}

function hidden() {
    console.log("hola");
}
