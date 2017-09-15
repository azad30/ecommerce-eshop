<?php
require_once 'config.php';
class product extends Database
{
    /* For product insert method */
    /* For product insert method */
    public function insert(){
        $name = $_POST['product_name'];
        $catid = $_POST['cat'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $brand = $_POST['brand'];
        $description = $_POST['description'];
        $qty = $_POST['quantity'];
        $uploadfile=$_FILES['image']['name'];
        $folder="data/";
        if(move_uploaded_file($_FILES['image']['tmp_name'],"$folder".$_FILES['image']['name'])){
            $sql= $this->link->query("INSERT INTO product_tbl(product_name,image,cat_id,price,discount,brand,description,qty) VALUES('$name','$uploadfile','$catid','$price','$discount','$brand','$description','$qty')");
//            echo "<script>alert('Product created')</script>";
            echo "<script>window.location.href = './product.php'</script>";
            exit;
        }
    }

    public function modalInsert($productName,$image,$categoryName,$price,$discount,$brand,$description,$quantity){
            $data = $this->link->query("INSERT INTO product_tbl(product_name,image,cat_id,price,discount,brand,description,qty) VALUES('$productName','$image','$categoryName','$price','$discount','$brand','$description','$quantity')");
            if($data){
                return "data inserted";
            }
            else{
                return "data not inserted";
            }
    }

    public function product_insert($productName,$image,$categoryName,$price,$discount,$brand,$description,$quantity){
            $data = $this->link->query("INSERT INTO product_tbl(product_name,image,cat_id,price,discount,brand,description,qty) VALUES('$productName','$image','$categoryName','$price','$discount','$brand','$description','$quantity')");
            return $data;
    }

    /* For product all data show  method */
    public function show()
    {
        $sql = $this->link->query("SELECT category.name,product_tbl.cat_id,product_tbl.price,product_tbl.product_name,product_tbl.image,product_tbl.id
FROM product_tbl,category
WHERE product_tbl.cat_id=category.id ");
        return $sql;
    }

    /* For product single data show  method */
    public function single_product()
    {
        $id = $_GET['edit'];
        $sql = $this->link->query("SELECT * FROM product_tbl WHERE id='$id'");
        return $sql;
    }

    /* For product data update method */
    /* For product data update method */
    public function update(){
        $name = $_POST['product_name'];
        $catid = $_POST['cat'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $brand = $_POST['brand'];
        $description = $_POST['description'];
        $qty = $_POST['quantity'];
        $id     = $_POST['hiddenid'];
        $uploadfile=$_FILES['image']['name'];
        $folder="data/";
        if(move_uploaded_file($_FILES['image']['tmp_name'],"$folder".$_FILES['image']['name'])){
            $sql= $this->link->query("UPDATE product_tbl SET product_name='$name',image='$uploadfile',cat_id='$catid',price='$price',discount='$discount',brand='$brand',qty='$qty',description='$description' WHERE id='$id'");
           // echo "<script>alert('Product Update successfully')</script>";
            echo "<script>window.location.href = './product.php'</script>";
            exit;
        }
        if(file_exists($uploadfile)){
            unlink($folder . "/" . $uploadfile);
        }
    }

    /* For category data delete method */
    public function delete($id)
    {
        $data = $this->link->query("DELETE FROM product_tbl WHERE id = '$id'");
        return $data;

    }
}

?>