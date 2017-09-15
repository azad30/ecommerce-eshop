<?php
require_once('config.php');
class order extends Database{
    /* For user product order  method */
    public function user_order(){
		$customerid=$_POST['customerid'];
        $payment   =$_POST['payment'];
        $sessionid = session_id();
        $sql=$this->link->query("SELECT * FROM cart WHERE session_id='$sessionid'");
        if($sql){
            while($result=$sql->fetch_assoc()){
                $productid=$result['product_id'];
				$color=$result['color'];
				$quantity=$result['quantity'];
				$price=$result['price'];
				$total=$result['total'];
                $orderdata=$this->link->query("INSERT INTO product_order(user_id,product_id,color,quantity,price,payment,total)VALUES('$customerid','$productid','$color','$quantity','$price','$payment','$total')");
            }
        }
        if($orderdata){
            $sid=session_id();
            $sql=$this->link->query("DELETE FROM cart WHERE session_id='$sid'");
            session_destroy();
            echo "<script>window.location.href = './confirm-order.php'</script>";
        }
    }
}
?>