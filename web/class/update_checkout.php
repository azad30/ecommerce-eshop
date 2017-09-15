<?php
require_once 'config.php';
require_once 'cart.php';



if (isset($_POST['id'])){
    $id             = $_POST['id'];

    $updateCart      = new cart();
    $data           = $updateCart->updateCart($id);
    return response()->json($data);
}

if (isset($_POST['checkout_id'])){

    $id             = $_POST['checkout_id'];
    $quantity       = $_POST['quantity'];
    $total          = $_POST['total'];

    $checkoutp_update      = new cart();
    $data           = $checkoutp_update->updateCheckout($id,$quantity,$total);
    echo $data;
}