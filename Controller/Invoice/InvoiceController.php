<?php
include_once '../Model/Invoice/InvoiceModel.php';
@session_start();
class InvoiceController
{

    private $objInvoice;

    public function __construct()
    {
        $this->objInvoice = new InvoiceModel();
    }

    public function getInvoice()
    {

        $depto = $this->objInvoice->consult("*", "department");
        include_once '../View/Invoice/Invoice.php';
    }

    public function createInvoice()
    {

        if (isset($_POST)) {

            $user = $_SESSION['id'];
            $tel = $_POST['tel'];
            $address = $_POST['address'];
            $address2 = $_POST['address2'];
            $barrio = $_POST['barrio'];
            $city = $_POST['city'];
            $pay = $_POST['pay'];
            $total = $_POST['total'];

            $customer = $this->objInvoice->consult("*", "customer", "user_id=$user");

            if (mysqli_num_rows($customer) > 0) {

                foreach ($customer  as $cus) {
                    $cus_id = $cus['cus_id'];
                }
                $this->objInvoice->update(
                    "invoice",
                    "cus_id=$cus_id",
                    array(
                        "cus_tel" => "'$tel'",
                        "cus_address_sh" => "'$address'",
                        "cus_address_sh_two" => "'$address2'",
                        "cus_district" => "'$barrio'",
                        "cit_id" => "'$city'"
                    )
                );
            } else {
                $cus_id = $this->objInvoice->autoIncrement("cus_id", "customer");
                $this->objInvoice->create(
                    "customer",
                    "cus_id,cus_tel,cus_address_sh,cus_address_sh_two,cus_district,cit_id,user_id",
                    "$cus_id,'$tel','$address','$address2','$barrio',$city,$user"
                );
            }

            $inv_id = $this->objInvoice->autoIncrement("inv_id", "invoice");
            $this->objInvoice->create(
                "invoice",
                "inv_id,inv_total,cus_id,pay_id",
                "$inv_id,'$total',$cus_id,$pay"
            );

            $cart = $this->objInvoice->consult("*", "cart", "user_id=$user");
            foreach ($cart as $car) {
                $cart_id = $car['cart_id'];
                $cart_detail = $this->objInvoice->consult("*", "cart_detail", "cart_id=$cart_id");

                foreach ($cart_detail as $cd) {

                    $inv_det_id = $this->objInvoice->autoIncrement("inv_det_id", "invoice_detail");
                    $cant = $cd['quantity'];
                    $pro = $cd['pro_id'];
                    $this->objInvoice->create(
                        "invoice_detail",
                        "inv_det_id,inv_id,inv_quantity,pro_id",
                        "$inv_det_id,$inv_id,$cant,$pro"
                    );
                }
                $this->objInvoice->delete("cart_detail", "cart_id=$cart_id");
            }

            $_SESSION['invoice'] = $inv_id;
            redirect("invoice.php");
        } else {
            echo "no se recibieron datos por post";
        }
    }

    public function viewInvoice()
    {

        if (isset($_SESSION['invoice'])) {

            $inv_id = $_SESSION['invoice'];
            $invoice = $this->objInvoice->consult("i.inv_id,i.inv_date,i.inv_total,p.pay_id,c.cus_id,c.cus_tel,c.cus_address_sh", "invoice i,customer c,pay p", "inv_id='$inv_id'");
            // $invoice_detail = $this->objInvoice->consult("*","invoice_detail","cart_id=$cart_id");
            $inv = mysqli_fetch_assoc($invoice);

            $col = array();
            $col = [
                "invoice" => "hola"
            ];
            $myObj = new \stdClass();
            $myObj->info = $col;
            $myObj->invoice = $inv;
            $myJSON = json_encode($myObj);
            return print_r($myJSON);
        }
    }
}
