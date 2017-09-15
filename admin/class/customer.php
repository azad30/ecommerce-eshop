<?php
require_once 'config.php';
class customer extends Database{
    /* Display all user or customer*/
    public function all_customer(){
        $sql= $this->link->query("SELECT * FROM users");
        return $sql;
    }
    /*Active customer*/
    public function active_customer(){
        $id = $_GET['id'];
        $sql= $this->link->query("UPDATE users SET status='Active' WHERE id=$id");
    }
    /*Deactive customer*/
    public function deactive_customer(){
        $id = $_GET['deactivate_id'];
        $sql= $this->link->query("UPDATE users SET status='Deactive' WHERE id=$id");
    }

    public function status_change($user_id, $status){

        $sql = $this->link->query("UPDATE users SET status='$status' WHERE id='$user_id'");
    }
}
?>