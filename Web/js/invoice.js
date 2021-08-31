function loadInvoice() {


    var url = `fecth.php?modulo=Invoice&controlador=Invoice&funcion=viewInvoice`;
    fetch(url)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {

            var date = document.getElementById('date');
            date.value = data.invoice.inv_date;
            var inv_id = document.getElementById('inv_id');
            inv_id.value = data.invoice.inv_id;
            var name = document.getElementById('name');
            name.innerHTML = data.invoice.user_name+" "+data.invoice.user_last_name;
            var address = document.getElementById('address');
            address.innerHTML = data.invoice.cus_address_sh;
            var tel = document.getElementById('tel');
            tel.innerHTML = data.invoice.cus_tel;
            var total = document.getElementById('total_price');
            total.innerHTML = data.invoice.inv_total;
            var tbl = document.getElementById('tbl');
            tbl.innerHTML = data.info.detail;
            // console.log(data);
            // var container = document.getElementById('body');
            // container.innerHTML = data;
        })
        .catch(function (error) {
            console.log(error);
        });
}