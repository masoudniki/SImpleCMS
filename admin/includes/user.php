<?php

    class user extends db_object{

        protected static $db_table="users";//name of the user table 
        protected static $db_table_fields=['username','password','FirstName','LastName'];
        protected static $search_table="ID";
        public $ID;
        public $username;
        public $LastName;
        public $password;
        public $FirstName;
        
        

         

       
        



       


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