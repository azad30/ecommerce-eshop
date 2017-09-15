<?php
require_once 'config.php';
require_once 'category.php';

// category delete section
if(isset($_POST['id'] )) {
    $id              = $_POST['id'];
    $deleteCategory  = new category();
    $data            = $deleteCategory->deleteCategory($id);
    echo $data;

}

//category create section
if(isset($_POST['categoryName'] )) {
    $categoryName    = $_POST['categoryName'];
    $createCategory  = new category();
    $data            = $createCategory->createCategory($categoryName);
    echo $data;

}

// category edit section
if(isset($_POST['catID'] )) {
    $catID          = $_POST['catID'];
    $editCategory   = new category();
    $data           = $editCategory->editCategory($catID);
    echo $data;

}

// category update section
if (isset($_POST['cat_update_id'])){
    $catID = $_POST['cat_update_id'];
    $categoryName = $_POST['updateCategoryName'];

    $categoryUpdate = new category();
    $data = $categoryUpdate->updateCategory($catID,$categoryName);
    echo $data;
}



