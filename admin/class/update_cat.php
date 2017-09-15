<?php
require_once 'config.php';
require_once 'category.php';

if (isset($_POST['cat_update_id'])){
$catID = $_POST['cat_update_id'];
$categoryName = $_POST['updateCategoryName'];

echo $categoryName;

//echo "hi";
}