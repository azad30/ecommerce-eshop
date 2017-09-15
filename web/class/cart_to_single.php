<?php
require_once 'config.php';
require_once 'cart.php';

//echo 'hi';


if (isset($_GET['id']))
{
     //$_GET['id'];
    $id             = $_GET['id'];
    $price          = $_GET['price'];
    $color          = $_GET['color'];
    $quantity       = $_GET['quantity'];

    $addTocart      = new cart();
    $data           = $addTocart->addTocart($id,$price,$color,$quantity);
    echo $data;

}

