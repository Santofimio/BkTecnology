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