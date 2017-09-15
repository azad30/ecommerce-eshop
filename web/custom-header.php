<?php
//session_start();
//if (!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')) {
//    echo "<script>alert('You are not login user please login')</script>";
//    echo "<script>window.location.href = 'login.php'</script>";
//    exit();
//}
//$session_id=$_SESSION['username'];
require_once 'class/config.php';
require_once'class/product.php';
$product = new product();
require_once'class/category.php';
$category = new category();
require_once'class/cart.php';
$cart = new cart();
require_once'class/search.php';
$search = new search();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Best Store a Ecommerce Online Shopping</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- js -->
    <script src="js/jquery.min.js"></script>
    <!-- //js -->
    <!-- for bootstrap working -->
    <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
    <!-- //for bootstrap working -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- timer -->
    <link rel="stylesheet" href="css/jquery.countdown.css" />
    <!-- //timer -->
    <!-- animation-effect -->
    <link href="css/animate.min.css" rel="stylesheet">
    <script src="js/wow.min.js"></script>
    <!-- //animation-effect -->
</head>
<body>
<!-- header -->
<div class="header">
    <div class="container">
        <div class="header-grid">
            <div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                <ul>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">@example.com</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 892</li>
                    <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="login.php">Login</a></li>
                    <li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="register.php">Register</a></li>
                </ul>
            </div>
            <div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
                <ul class="social-icons">
                    <li><a href="#" class="facebook"></a></li>
                    <li><a href="#" class="twitter"></a></li>
                    <li><a href="#" class="g"></a></li>
                    <li><a href="#" class="instagram"></a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="logo-nav">
            <div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
                <h1><a href="index.php">Best Store <span>Shop anywhere</span></a></h1>
            </div>
            <div class="logo-nav-left1">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.php" class="act">Home</a></li>
                            <!-- Mega Menu -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <h6>Men's Wear</h6>
                                                <li><a href="products.html">Clothing</a></li>
                                                <li><a href="products.html">Wallets</a></li>
                                                <li><a href="products.html">Shoes</a></li>
                                                <li><a href="products.html">Watches</a></li>
                                                <li><a href="products.html">Accessories</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <h6>Women's Wear</h6>
                                                <li><a href="products.html">Clothing</a></li>
                                                <li><a href="products.html">Wallets,Bags</a></li>
                                                <li><a href="products.html">Footwear</a></li>
                                                <li><a href="products.html">Watches</a></li>
                                                <li><a href="products.html">Accessories</a></li>
                                                <li><a href="products.html">Jewellery</a></li>
                                                <li><a href="products.html">Beauty & Grooming</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <h6>Kid's Wear</h6>
                                                <li><a href="products.html">Kids Home Fashion</a></li>
                                                <li><a href="products.html">Boy's Clothing</a></li>
                                                <li><a href="products.html">Girl's Clothing</a></li>
                                                <li><a href="products.html">Shoes</a></li>
                                                <li><a href="products.html">Brand Stores</a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Furniture <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <h6>Home Collection</h6>
                                                <li><a href="furniture.html">Cookware</a></li>
                                                <li><a href="furniture.html">Sofas</a></li>
                                                <li><a href="furniture.html">Dining Tables</a></li>
                                                <li><a href="furniture.html">Shoe Racks</a></li>
                                                <li><a href="furniture.html">Home Decor</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <h6>Office Collection</h6>
                                                <li><a href="furniture.html">Carpets</a></li>
                                                <li><a href="furniture.html">Tables</a></li>
                                                <li><a href="furniture.html">Sofas</a></li>
                                                <li><a href="furniture.html">Shoe Racks</a></li>
                                                <li><a href="furniture.html">Sockets</a></li>
                                                <li><a href="furniture.html">Electrical Machines</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <h6>Decorations</h6>
                                                <li><a href="furniture.html">Toys</a></li>
                                                <li><a href="furniture.html">Wall Clock</a></li>
                                                <li><a href="furniture.html">Lighting</a></li>
                                                <li><a href="furniture.html">Top Brands</a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                            <li><a href="short-codes.html">Short Codes</a></li>
                            <li><a href="mail.html">Mail Us</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="logo-nav-right">

                <!--                search result shown area-->

                <div class="search-box">
                    <div id="sb-search" class="sb-search">
                        <form method="GET">
                            <input type="text" name="namee" id="namee" class="sb-search-input" placeholder="Enter your search term...">
                            <div id="show"></div>
                            <span class="sb-icon-search"></span>
                        </form>
                    </div>
                </div>
                <!-- search-scripts -->
                <script src="js/classie.js"></script>
                <script src="js/uisearch.js"></script>
                <script>
                    new UISearch( document.getElementById('sb-search'));
                </script>
                <!-- //search-scripts -->
            </div>
            <div class="header-right">
                <div class="cart box_1">
                 <a href="checkout.php">
                        <h3> <div class="total">
                                <span class="simpleCart_total"></span> <span id="simpleCart_quantity" class="simpleCart_quantity"></span>
								<?php
								$read  = $cart->cart_item();
								while($row=$read->fetch_array()){
								?>
                                    <img src="images/bag.png">  <div style="margin-top:5px;"><?php echo $row['COUNT(quantity)'].'&nbsp'.'items'; ?></div>
								<?php } ?>
								</div>
                          </h3>
                      </a>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div id="dataTable"></div>
<script type="text/javascript">
    $(document ).ready(function(){
        $('#namee').keyup(function(){
            var namee = $(this).val();
            $.ajax({
                method  : "GET",
                url     : "../web/class/product_search.php",
                data    :{ namee:namee },
                dataString : ['namee'],
                success:function(data){
                    $("#dataTable").html(data);
                },
                error: function(){
                    console.log('error');
                }
            });
        });
    });
</script>
<!-- //header -->