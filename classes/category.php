<?php

include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\lib\Session.php';
include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\lib\Database.php';
include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\helpers\format.php';

class category {
    public $db;
    public $fr;

    public function __construct() {
        $this->db = new Database();
        $this->fr = new Format();
    }

    public function AddCategory($catName) :string{
        $catName = $this->fr->Validation($catName);

        if (empty($catName)) {
            return '<div class="alert alert-danger" role="alert">Category name is empty!</div>';
        } else {
            $selectQuery = "SELECT categoryName FROM categorys WHERE categoryName = '$catName'";
            $selectResult = $this->db->select($selectQuery);

            if ($selectResult && $selectResult->num_rows > 0) {
                return '<div class="alert alert-danger" role="alert">Category Already Exists!</div>';
            } else {
                $insertQuery = "INSERT INTO categorys (categoryName) VALUES ('$catName')";
                $insertValue = $this->db->insert($insertQuery);
            }
        }

        $catName = null;
        return '<div class="alert alert-success" role="alert">Category Added Successfully !</div>';
    }
}


?>
