function loadInvoice() {

    var url = `fecth.php?modulo=Invoice&controlador=Invoice&funcion=viewInvoice`;
    fetch(url)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {

            var tel = document.getElementById('date');
            tel.value = data.invoice.inv_date;
            var inv_id = document.getElementById('inv_id');
            inv_id.value = data.invoice.inv_id;
            // console.log(data);
            console.log(data);
            // var container = document.getElementById('body');
            // container.innerHTML = data;
        })
        .catch(function (error) {
            console.log(error);
        });
}