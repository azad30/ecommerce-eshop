<?php require('header.php'); ?><!-- include header -->
<!-- for user registration -->
<?php
require_once 'class/register.php';
if(isset($_POST['submit'])){
    $register = new register();
    $register->user_register();
}
?>
<!-- end user registration -->

<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Register Page</li>
        </ol>
    </div>
</div>
<!-- form user registration form -->
<div class="inner-block container register login-form-grids">
    <div class="blank">
        <h2 class="text-center">Register Here</h2>
        <div class="blankpage-main">
            <form name="register" method="post" onsubmit="return validateForm()" action="">
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" name="user_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">User Email</label>
                    <input type="email" name="user_email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">User Password</label>
                    <input type="password" name="user_pass" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">User Mobile</label>
                    <input type="text" name="user_mobile" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">User Address</label>
                    <input type="text" name="user_address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">User Country</label>
                    <input type="text" name="user_country" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Zip Code</label>
                    <input type="text" name="zip_code" class="form-control">
                </div>
                <button type="submit" name="submit" class="btn btn-info">Save</button>
            </form>
        </div>
    </div>
</div>
<br>
<!-- end user registration form -->
<?php require('footer.php'); ?><!-- include footer -->