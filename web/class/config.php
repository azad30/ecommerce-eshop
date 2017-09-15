<?php
class Database{
  public $host;
  public $user;
  public $pass;
  public $db;
  public $link;
	  public function __construct() {
		$this->db_connect();
	  }
	  public function db_connect(){
		$this->host = 'localhost';
		$this->user = 'root';
		$this->pass = '';
		$this->db = 'eshop_db';
		$this->link = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
		if(!$this->link){
			echo 'error';
		}
	  }
} 
?>