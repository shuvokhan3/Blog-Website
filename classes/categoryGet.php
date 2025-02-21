<?php

include_once '../lib/Database.php';
include_once '../helpers/format.php';

class categoryGet{
    public $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getCategories(){

        $selectQuery = "SELECT * FROM categorys";
        $result = $this->db->select($selectQuery);

        if($result){
            return $result;
        }else{
            return false;
        }
    }


}