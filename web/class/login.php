<?php
require_once 'config.php';
class login extends Database{ /* For database class inheritance */
    /* For user login  method */
    public function login_user_customer($user_email,$user_pass){
//        $email = mysqli_real_escape_string($this->link,$user_email);
//        $password = mysqli_real_escape_string($this->link,$user_pass);
        $sql="SELECT * FROM users WHERE user_email='$user_email' and user_pass='$user_pass' and status='Active'";
//        $sql="SELECT * FROM users WHERE user_email='$email' and user_pass='$password' ";
        $result = mysqli_query($this->link,$sql);
        $row    = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count  = mysqli_num_rows($result);

        if($count > 0){
            $_SESSION['username'] = $row['user_name'];
            $_SESSION['id']=$row['id'];

//            echo $_SESSION['id'];
//            echo $_SESSION['username'];

            echo "<script>window.location.href = '../web/order.php'</script>";
        }
        else{
            echo "Error or you are deactive";
        }
    }
}
?>