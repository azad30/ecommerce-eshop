<?php
require_once 'config.php';
class product extends Database{
   /* For product all data show  method */
    public function show(){
		$sql= $this->link->query("SELECT category.name,product_tbl.cat_id,product_tbl.image,product_tbl.discount,product_tbl.price,product_tbl.product_name,product_tbl.id
        FROM product_tbl,category
        WHERE product_tbl.cat_id=category.id");
		return $sql;
	}
	  /* For product single data show  method */
	 public function single_product(){
		$id =$_GET['product'];
		$sql= $this->link->query("SELECT * FROM product_tbl WHERE id='$id'");
		return $sql;
	}

//	display product with limit

    /* For limit product */
    public function limit_show(){
        $sql= $this->link->query("SELECT category.name,product_tbl.cat_id,product_tbl.image,product_tbl.discount,product_tbl.price,product_tbl.product_name,product_tbl.id
        FROM product_tbl,category
        WHERE product_tbl.cat_id=category.id ORDER BY product_tbl.id LIMIT 2");
        return $sql;
    }


    /* For display category product method */
    public function category_product(){
        $id  =  $_GET['id'];
        $sql =  $this->link->query("SELECT * FROM product_tbl WHERE cat_id='$id'");
        return $sql;
    }

    /* For product review method */
    public function product_review(){
        $user      = $_POST['user_name'];
        $email     = $_POST['user_email'];
        $review    = $_POST['user_review'];
        $productid = $_POST['productid'];
        $approve   = 'Deactive';
        $sql =  $this->link->query("INSERT INTO product_review(user_name,user_email,user_review,product_id,Approve)VALUES('$user','$email','$review','$productid','$approve')");
        if($sql){
            echo "<script>alert('Review has been submit and its waiting for Admin Approve')</script>";
            exit;
        }
    }

// For display all product review /
    public function product_review_all(){
        $id =$_GET['product'];
        $sql= $this->link->query("SELECT * FROM product_review WHERE product_id='$id'");
        return $sql;
    }

}
?>