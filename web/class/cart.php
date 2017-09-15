<?php
session_set_cookie_params(0);
session_start();
require_once 'config.php';
class cart extends Database{
   /* For product all data show  method */
//    public function add_cart($id,$price,$Color,$quantity){
//        $id             = $_POST['id'];
//        $price          = $_POST['price'];
//        $color          = $_POST['color'];
//        $quantity       = $_POST['quantity'];
//		$total  = $price*$quantity;
//		$sql= $this->link->query("INSERT INTO cart(product_id,color,quantity,price)VALUES('$id','$color','$quantity','$price')");
//        return $sql;
//  }

    public function addTocart($id,$price,$color,$quantity){

        $total = $price * $quantity;
        $sid   = session_id();
        $check = $this->link->query("SELECT product_id FROM cart WHERE session_id='$sid' AND product_id = '$id' ");
        $count = mysqli_num_rows($check);

        if($count > 0){
            return "Product Already Exist";
        }else{
            $sql= $this->link->query("INSERT INTO cart(product_id,session_id,price,color,quantity,total)VALUES('$id','$sid','$price','$color','$quantity','$total')");
//          return $sql;
            if ($sql){
                return "Product Added Successfully";
            }
            else{
                return "Something went wrong";
            }
        }
    }

 /* For cart all data show  method */
    public function cart_all(){
        $sid            = session_id();
//		$sql= $this->link->query("SELECT cart.id,cart.product_id,cart.color,cart.quantity,cart.price,cart.total,product_tbl.product_name,product_tbl.image FROM cart,product_tbl WHERE cart.product_id=product_tbl.id");
        $sql= $this->link->query("SELECT cart.id,cart.product_id,cart.color,cart.quantity,cart.price,cart.total,product_tbl.product_name,product_tbl.image FROM cart,product_tbl WHERE cart.product_id=product_tbl.id AND cart.session_id = '$sid' ");
		return $sql;
	}
	
 /* For cart total price method */
	public function cart_total_price(){
        $sid = session_id();
		$sql=$this->link->query("SELECT SUM(total) FROM cart WHERE cart.session_id = '$sid' ");
		return $sql;
	}
	/* For display cart item method */
	public function cart_item(){
	    $sid = session_id();
		$sql =$this->link->query("SELECT COUNT(quantity) FROM cart WHERE cart.session_id = '$sid'");
		return $sql;
	}

	// here updateCarte doesn't mean the cart update; it shows the output of deleting product from checkout page
	public function updateCart($id){
        $data =$this->link->query("DELETE FROM cart WHERE product_id = '$id'");
        return $data;
      }

    public function updateCheckout($id, $quantity, $total){

        $sid            = session_id();

        if($quantity == 0){
            $sql =$this->link->query("DELETE FROM cart WHERE product_id='$id' AND session_id='$sid'");
        }
        else{
            $data = $this->link->query("UPDATE cart SET quantity='$quantity',total='$total' WHERE product_id=$id");
            if ($data){
                return "data updated";
            }
            else
            {
                return "Failed to update";
            }
        }
    }
	  
    /* For customer id with current session id */
    public function all_customer(){
        $sessionid=$_SESSION['id'];
        $sql= $this->link->query("SELECT * FROM users WHERE id='$sessionid'");
        return $sql;
    }
}
?>