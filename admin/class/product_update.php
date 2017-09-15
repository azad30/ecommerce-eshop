<?php
require_once 'config.php';
require_once 'product.php';

if(isset( $_POST['id'] )) {
    echo $_POST['productName'];
}

