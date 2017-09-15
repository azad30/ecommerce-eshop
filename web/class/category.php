<?php
require_once 'config.php';
class category extends Database{ /* For database class inheritance */
	
	/* For category insert method */
	public function insert(){
		$name = $_POST['category_name'];
		$sql= $this->link->query("INSERT INTO category(name)VALUES('$name')");
        if($sql){
		echo "<script>alert('Category created')</script>";
		echo "<script>window.location.href = './category.php'</script>";
        exit;
	   }
	}
	/* For category all data show  method */
    public function show(){
		$sql= $this->link->query("SELECT * FROM category");
		return $sql;
	}
	
	/* For category single data show  method */
	 public function single_cat(){
		$id =$_GET['edit'];
		$sql= $this->link->query("SELECT * FROM category WHERE id='$id'");
		return $sql;
	}

  /* For category data update method */
   public function update(){
		 $name   = $_POST['name'];
         $id     = $_POST['hiddenid'];
		 $sql= $this->link->query("UPDATE category SET name='$name' WHERE id=$id");
		 if($sql){
		echo "<script>alert('Category Update')</script>";	
		echo "<script>window.location.href = './category.php'</script>";
        exit;
	   }
	}
  /* For category data delete method */
	public function delete(){
		$id =$_GET['delete'];
		$sql= $this->link->query("DELETE FROM category WHERE id='$id'");
		 if($sql){
		echo "<script>alert('Are you sure want to delete?')</script>";	
		echo "<script>window.location.href = './category.php'</script>";
        exit;
	   }
	}

//	select all category
    public function cat_all(){
        $sql=$this->link->query("SELECT category.name,category.id,COUNT(cat_id) 
				FROM category LEFT JOIN product_tbl ON category.id = product_tbl.cat_id
				GROUP BY category.id");
        return $sql;
    }
}
?>