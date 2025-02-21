<?php


    //for login registration perpase i create a library where i work with session related 
    class Session{


        //i start session in static init();
        public static function init(){
            //start a session
            session_start();
        }

        //To set the value in a session i build set($key,$value), in set() function there are two paramentr on is session name and other is session value;
        public static function set($key, $value){
            $_SESSION[$key] = $value;
        }

        //In get function take a paramenter name $key , when i want to get a session this time i normally call this get funtion and set it argument ;
        public static function get($key){

            //if session properly set it return session 
            if(isset($_SESSION[$key])){
                return $_SESSION[$key];
            }else{//if not set it return false
                return false;
            }
        }



        //Check multiple condition 

        //loginCheck function check that if user is already login 
        public static function oldUserloginCheck(){
            self::init();
            if(self::get('login')==true){
                header('location:index.php');
            }
        }


        //if user not register and not login
        public static function newUserCheck(){
            self::init();
            if(self::get('login') == false){
                session_destroy();
                header('Location:login.php');
            }
        }


        //if user logout 
        public static function oldUserlogoutCheck(){
            session_destroy();
            header('Location:login.php');
        }

    }
?>