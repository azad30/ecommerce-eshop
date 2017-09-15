<?php
require_once 'config.php';
class login extends Database{ /* For database class inheritance */
     public function login_user(){
      $email = mysqli_real_escape_string($this->link,$_POST['user_email']);
      $password = mysqli_real_escape_string($this->link,$_POST['user_pass']);

      $sql="SELECT * FROM users WHERE user_email='$email' and user_pass='$password' and status= 1 ";
      $result=mysqli_query($this->link,$sql);
      $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count=mysqli_num_rows($result);
      if($count>0){
      $_SESSION['username'] = $row['user_name'];
	  $_SESSION['id']=$row['id'];
       header('location:user.php');
      }
      if($email=='admin@email.com' && $password =='123456'){
            header('location:index.php');
      }	else{
		  echo "Error or you are deactive";
	 }  
  } 
}
?>