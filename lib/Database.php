<?php

   //add config.php file in this database folder
   include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\config\config.php';


  //create a class name Database
  class Database{
    public $host = HOST;
    public $user = USER;
    public $password = password;
    public $database = DATABASE;
    public $linkWithDatabase;
    public $error;
    

    // this constructor function are called when i create object in this class and this time databaseConnection() function automatically called
    public function __construct(){
        $this->databaseConnection();
    }


    //Here i connect database with php
    public function databaseConnection(){
        //mysqli_connect() Driver user to connect database and this connection is store on linkWithDatabase variable
        $this -> linkWithDatabase = mysqli_connect($this -> host, $this -> user, $this -> password, $this -> database);
        
        //if the database not connted this time it return false
        if(!$this->linkWithDatabase){
            // $this->error = "Database Connection failed <br>";
            // echo $this->error;
            return false;
        }
    }


     //Select Query
     //Here i write Query so that in future i use this query, In function i normally put argument on 14-0
     public function select($query){

        $selectQueryResult = mysqli_query($this->linkWithDatabase, $query);

        //check the query not run proprly
        if(!$selectQueryResult){
           return false;
        }

        return $selectQueryResult;
    }


    //Inset Query
    public function insert($query){
        
        $insertQueryResult = mysqli_query($this->linkWithDatabase,$query);


       if($insertQueryResult){
           return true;
       }else{
           $this->error = "Insert Query Not Working";
           return $this->error;
       }
    }


    //update Query
    public function update($query){
        $updateQueryResult = mysqli_query($this->linkWithDatabase,$query);

        if(!$updateQueryResult){
            return "Updatae query error";
        }

        return $updateQueryResult;

        
    }

    //Delete Query
    public function delete($query){
        $deleteQueryResult = mysqli_query($this->linkWithDatabase, $query);

        if($deleteQueryResult){
            return $deleteQueryResult;
        }
        else{
            return "No Delete query perform";
        }
    }

  }



// // Instantiate the Database class
// $database = new Database();

// // // Call the databaseConnection method
// // $database->databaseConnection();
