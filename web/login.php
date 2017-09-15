<?php require('header.php'); ?><!-- include header -->
<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Login Page</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<!-- for login form -->
<?php

if(isset($_POST['login'])){
    require_once 'class/login.php';
    $user_email = $_POST['user_email'];
    $user_pass  = $_POST['user_pass'];

    $login      = new login();
    $check_user_existence = $login->login_user_customer($user_email,$user_pass);
}
?>
<div class="login">
    <div class="container">
        <h3 class="animated wow zoomIn" data-wow-delay=".5s">Login Form</h3> <?php //echo $_SESSION['username']; ?>
        <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
            <form method="post" action="">
                <input type="email" name="user_email" placeholder="Email Address" required=" " >
                <input type="password" name="user_pass" placeholder="Password" required=" " >
                <!--					<div class="forgot">-->
                <!--						<a href="#">Forgot Password?</a>-->
                <!--					</div>-->
                <button type="submit" class="btn btn-info" name="login">Login</button>
            </form>
        </div>
        <h4 class="animated wow slideInUp" data-wow-delay=".5s">For New People</h4>
        <p class="animated wow slideInUp" data-wow-delay=".5s"><a href="register.php">Register Here</a> (Or) go back to <a href="index.php">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
    </div>
</div>
<!-- end login form -->
<?php require('footer.php'); ?><!-- include footer-->