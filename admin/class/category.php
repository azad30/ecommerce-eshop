<?php
require_once 'config.php';
class category extends Database{ /* For database class inheritance */
	
	/* For category insert method */
//	public function insert(){
//		$name = $_POST['category_name'];
//		$sql= $this->link->query("INSERT INTO category(name)VALUES('$name')");
//        if($sql){
//		echo "<script>alert('Category created')</script>";
//		echo "<script>window.location.href = './category.php'</script>";
//        exit;
//	   }
//	}

    /* Create Category */
    public function createCategory($categoryName)
    {
        $data = $this->link->query("INSERT INTO category(name)VALUES('$categoryName')");
        return $data;
    }

	/* For category all data show  method */
    public function show(){
		$sql= $this->link->query("SELECT * FROM category");
		return $sql;
	}
	
	/* For category single data show  method */
//	 public function single_cat(){
//		$id =$_GET['edit'];
//		$sql= $this->link->query("SELECT * FROM category WHERE id='$id'");
//		return $sql;
//	}


//	Edit category
	public function editCategory($catID){
       // $data = $this->link->query("SELECT name FROM category WHERE id='$catID'");

        return $catID;
    }

//    update category

    public function updateCategory($catID,$categoryName){
	    $data = $this->link->query("UPDATE category SET name='$categoryName' WHERE id=$catID");
	    return $data;
    }



    /* For category data delete method */
    public function deleteCategory($id)
    {
        $data = $this->link->query("DELETE FROM category WHERE id = '$id'");
        return $data;
    }
}
?>