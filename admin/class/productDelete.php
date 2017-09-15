<?php
require_once 'config.php';
require_once 'product.php';

if(isset( $_POST['id'] )) {
    $id             = $_POST['id'];
    $deleteProduct  = new product();
    $data           = $deleteProduct->delete($id);
    return response()->json($data);

}

