<?php
/* For user already session or not class */
class session_check{
    /* For session check method */
    public function user_auth(){
        if (!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')) {
            echo "<div class='alert alert-danger'>
                  <strong>Olala!</strong>You Must be login to Order <a href='./login.php'>Login</a> .
                 </div>";
//            echo "<script>window.location.href = './checkout.php'</script>";
            exit();
        }else{
            echo "<script>window.location.href = './order.php'</script>";
        }
    }
}
?>