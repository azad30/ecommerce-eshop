<?php
require_once 'config.php';
require_once 'product.php';
require_once 'modal_function.php';
if(isset($_POST["operation"]))
{
    if($_POST["operation"] == "Add")
    {
        $image = '';
        if($_FILES["user_image"]["name"] != '')
        {
            $image = upload_image();
        }

        $firstname = $_POST['first_name'];
        $lastname  = $_POST['last_name'];

        $modal_data_insert = new product();
        $data_save_to_db = $modal_data_insert->modalInsert($image,$firstname,$lastname);
        echo $data_save_to_db;

//        $statement = $this->link->prepare("
//			INSERT INTO modal_users (firstname, lastname, image)
//			VALUES (:first_name, :last_name, :image)
//		");
//        $result = $statement->execute(
//            array(
//                ':first_name'	=>	$_POST["first_name"],
//                ':last_name'	=>	$_POST["last_name"],
//                ':image'		=>	$image
//            )
//        );
//        if(!empty($result))
//        {
//            echo 'Data Inserted';
//        }
    }
//    if($_POST["operation"] == "Edit")
//    {
//        $image = '';
//        if($_FILES["user_image"]["name"] != '')
//        {
//            $image = upload_image();
//        }
//        else
//        {
//            $image = $_POST["hidden_user_image"];
//        }
//        $statement = $connection->prepare(
//            "UPDATE users
//			SET first_name = :first_name, last_name = :last_name, image = :image
//			WHERE id = :id
//			"
//        );
//        $result = $statement->execute(
//            array(
//                ':first_name'	=>	$_POST["first_name"],
//                ':last_name'	=>	$_POST["last_name"],
//                ':image'		=>	$image,
//                ':id'			=>	$_POST["user_id"]
//            )
//        );
//        if(!empty($result))
//        {
//            echo 'Data Updated';
//        }
//    }
}

?>