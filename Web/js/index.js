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

function pay() {

    var btn = document.getElementById('btn-getPay');
    var p = btn.parentNode;
    var total = document.getElementById('total').value;


    var url = `fecth.php?modulo=Invoice&controlador=Invoice&funcion=getInvoice`;
    fetch(url)
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {

            var container = document.getElementById('cont-cart');
            container.innerHTML = data;
            p.removeChild(btn);
            var total_input = document.getElementById('input-total');
            total_input.value = total;

            console.log(data);
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
    var cantidad = document.getElementById('cont-cant').value;
    const datos = new FormData();
    datos.append('id', id);
    datos.append('cant', cantidad);
    var url = `fecth.php?modulo=Cart&controlador=Cart&funcion=addCart`;
    fetch(url, {
        method: "POST",
        body: datos,
    })
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {

            if (data === "login.php") {
                window.location.href = data;
            } else {
                var container_counter = document.getElementById('counter');
                container_counter.innerHTML = data;

            }

        })
        .catch(function (error) {
            console.log(error);
        });
}

function deleteCart(pro_id) {


    const datos = new FormData();
    datos.append('pro_id', pro_id);
    var url = `fecth.php?modulo=Cart&controlador=Cart&funcion=deleteCart`;
    fetch(url, {
        method: "POST",
        body: datos,
    })
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {

            var container_counter = document.getElementById('counter');
            container_counter.innerHTML = data.info.cont_cart;
            var container_total = document.getElementById('cont-total');
            container_total.innerHTML = `$${data.info.total}`;
            var container_con_sup = document.getElementById('cont-sup');
            container_con_sup.innerHTML = data.info.cont_cart;

            var pro = document.getElementById('pk-' + pro_id);
            var p = pro.parentNode;
            var prot = document.getElementById('pkt-' + pro_id);
            var pt = prot.parentNode;
            console.log(pt);
            console.log(prot);
            p.removeChild(pro);
            pt.removeChild(prot);

            if (data.info.cont_cart == "0") {
                string = `<div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">No tienes productos en el carrito!</h4>
                            <hr>
                        </div>`;
                var container = document.getElementById('cont-card-list');
                container.innerHTML = string;
            }







        })
        .catch(function (error) {
            console.log(error);
        });
}

function getCart() {
    var url = `fecth.php?modulo=Cart&controlador=Cart&funcion=getCart`;
    fetch(url)
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

function getProductCat(cat) {
    const datos = new FormData();
    datos.append('cat', cat)
    var url = `fecth.php?modulo=Product&controlador=Product&funcion=getProductCat`;
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

function getProductCatSub(cat_sub) {
    const datos = new FormData();
    datos.append('cat_sub', cat_sub)
    var url = `fecth.php?modulo=Product&controlador=Product&funcion=getProductCatSub`;
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

function cant(valor) {

    var valor = parseInt(valor)
    var cont = document.getElementById('cont-cant');
    var cantidad = document.getElementById('cont-cant').value;
    var cantidad = parseInt(cantidad);

    console.log("este es el cantidad->" + cantidad);

    if (valor === 1) {

        cantidad = cantidad + 1;

        console.log(cantidad);

    } if (valor === 0 && cantidad > 1) {
        cantidad = cantidad - 1;

    }


    cont.value = cantidad;
    console.log(cont.value);
}

function sd(tbl, id, idp) {

    var id = document.getElementById(`${id}`).value;
    var idp = document.getElementById(`${idp}`);

    const datos = new FormData();
    datos.append('id', id)

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

function payForm(id) {
    formpay = document.getElementById(id);

    if (id === 'form-card') {
        form = document.getElementById('form-pse');
        form.style.display = 'none';
        formpay.style.display = 'block';

        var str = `<div class='container pt-3' id='form-c'>
                    <div class='row'>
                        <div class='col'>
                            <div class='mb-3'>
                                <label for='num-card' class='form-label'>Numero Tarjeta De Credito</label>
                                <input type='text' class='form-control' id='num-card' name='num-card' required=''>
                            </div>
                        </div>
                        <div class='col'>
                            <div class='mb-3'>
                                <label for='titular' class='form-label'>Titular De La Tarjeta</label>
                                <input type='text' class='form-control' id='titular' name='titular' required=''>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col'>
                            <div class='mb-3'>
                                <label for='vencimiento' class='form-label'>Fecha De Vencimiento</label>
                                <input type='text' class='form-control' id='vencimiento' name='vencimiento' required=''>
                            </div>
                        </div>
                        <div class='col'>
                            <div class='mb-3'>
                                <label for='csv' class='form-label'>Codigo CSV</label>
                                <input type='text' class='form-control' id='csv' name='csv' required=''>
                            </div>
                        </div>
                    </div>
                </div>`;



        formpay.innerHTML = str;

    } if (id === 'form-pse') {
        form = document.getElementById('form-card');
        form.style.display = 'none';
        form_c = document.getElementById('form-c');
        form.removeChild(form_c)
        formpay.style.display = 'block';
    }
}

function verificarPay(element) {

    if (element.addEventListener) {
        element.addEventListener("submit", function (evt) {
            evt.preventDefault();
            window.history.back();
        }, true);
    }
    else {
        element.attachEvent('onsubmit', function (evt) {
            evt.preventDefault();
            window.history.back();
        });
    }
    // event.preventDefault();
    // event.submit();
    console.log("hola");
}

