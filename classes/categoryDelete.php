<?php

include_once '../lib/Database.php';

class categoryDelete{
    public $db;
    function __construct(){
        $this->db = new Database();
    }

    public function deleteCategory($id){
        $deleteQuery = "DELETE FROM categorys WHERE categorysId='$id'";
        $result = $this->db->delete($deleteQuery);

        if($result){
            return "Deleted Successfully";
        }else{
            return "Error deleting category";
        }
    }
}
