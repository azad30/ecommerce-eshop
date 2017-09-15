<?php
require_once 'config.php';
require_once 'customer.php';

if(isset( $_POST['id'] )) {
    $user_id        = $_POST['id'];
    $status         = $_POST['status'];

    $status_change  = new customer();
    $data           = $status_change->status_change($user_id, $status);
    return response()->json($data);
}



