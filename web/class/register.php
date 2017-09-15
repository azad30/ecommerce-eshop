<?php
require_once 'config.php';
/* For user register class */
class register extends Database{
    /* For user register  method */
    public function user_register(){
        $user       = $_POST['user_name'];
        $email      = $_POST['user_email'];
        $mobile     = $_POST['user_mobile'];
        $password   = $_POST['user_pass'];
        $address    = $_POST['user_address'];
        $country    = $_POST['user_country'];
        $zipcode    = $_POST['zip_code'];
        $status     = 1;
        $sql        = $this->link->query("INSERT INTO users(user_name,user_email,user_pass,user_mobile,user_address,user_country,zip_code,status)VALUES('$user','$email','$password','$mobile','$address','$country','$zipcode','$status')");
        if($sql){
            echo "<div class='container alert alert-success'>
  <strong>Success!</strong>Registration Successful.
</div>";
            echo "<script type=\"text/JavaScript\">
      setTimeout(\"location.href = 'login.php';\",2500);
 </script>";
        }
    }
}
?>