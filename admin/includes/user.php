<?php

    class user extends db_object{

        protected static $db_table="users";//name of the user table 
        protected static $db_table_fields=['username','password','FirstName','LastName','user_image'];
        protected static $search_table="ID";
        public $ID;
        public $username;
        public $LastName;
        public $password;
        public $FirstName;
        public $user_image;
        public $up_dir="Avatar";
        public $place_holder="https://via.placeholder.com/150x150?text=Image";
        
        public function image_path_and_placeholder(){
            return (empty($this->user_image)?$this->place_holder:$this->up_dir.DS.$this->user_image);
        }

         

       
        



       


        //check the user exist in database
        public static function verify_user($username,$passwod)
        {
            global $database;

            //clean the input
            $username=$database->escape_string($username);
            $passwod=$database->escape_string($passwod);


            $sql="select * from ".self::$db_table." where UserName='$username' AND Password='$passwod'";
            $result_array=self::find_by_query($sql);
             
            return !empty($result_array)?array_shift($result_array):false;
            



        }

    





      
      
        





    }
      














?>