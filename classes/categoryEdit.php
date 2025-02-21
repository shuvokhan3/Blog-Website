<?php

include_once '../lib/Database.php';
include_once '../helpers/format.php';

class categoryEdit{
    public $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function showCategoryName($id){
        $categoryNameQuery = " SELECT categoryName FROM categorys WHERE categorysId = '$id' ";
        return $this->db->select($categoryNameQuery);
    }

    public function updateCategoryName($id , $newCategory){
        //old category query from database
        $oldCategory = $this->showCategoryName($id);
        $row = mysqli_fetch_assoc($oldCategory);
        $oldCategory = $row['categoryName'];

        if(isset($oldCategory)){
            $updateQuery = "UPDATE categorys
            SET categoryName = '$newCategory'
            WHERE categoryName = '$oldCategory'";

            $updateQueryResult = $this->db->update($updateQuery);

            if ($updateQueryResult) {
                return "Category updated successfully";
            } else {
                return "Category updated failed";
            }

        }else{
            return "Category updated failed";
        }
    }
}


