<?php
require_once 'config.php';
class category extends Database{ /* For database class inheritance */
	
	/* For category insert method */
	public function insert(){
		$facebook = $_POST['facebook'];
        $linkedin = $_POST['linkedin'];
        $twitter = $_POST['twitter'];
        $youtube = $_POST['youtube'];
		$sql= $this->link->query("INSERT INTO social(facebook,linkedin,twitter,youtube)VALUES('$facebook','$linkedin','$twitter','$youtube')");
        if($sql){
		echo "<script>alert('link created')</script>";
		echo "<script>window.location.href = './social.php'</script>";
        exit;
	   }
	}
	/* For category all data show  method */
    public function show(){
		$sql= $this->link->query("SELECT * FROM social");
		return $sql;
	}
	
	/* For category single data show  method */
	 public function single_social(){
		$id =$_GET['edit'];
		$sql= $this->link->query("SELECT * FROM social WHERE id='$id'");
		return $sql;
	}

  /* For category data update method */
   public function update(){
         $facebook = $_POST['facebook'];
         $linkedin = $_POST['linkedin'];
         $twitter = $_POST['twitter'];
         $youtube = $_POST['youtube'];
         $id     = $_POST['hiddenid'];
		 $sql= $this->link->query("UPDATE category SET facebook='$facebook',linkedin='$linkedin',twitter='$twitter ',youtube='$youtube' WHERE id=$id");
         if($sql){
		 echo "<script>alert('Link Update')</script>";
		 echo "<script>window.location.href = './social.php'</script>";
         exit;
	   }
	}
  /* For category data delete method */
	public function delete(){
		$id =$_GET['delete'];
		$sql= $this->link->query("DELETE FROM social WHERE id='$id'");
		 if($sql){
		echo "<script>alert('Are you sure want to delete?')</script>";	
		echo "<script>window.location.href = './social.php'</script>";
        exit;
	   }
	}
}
?>