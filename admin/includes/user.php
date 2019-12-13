<?php

    class user{

        public $ID;
        public $username;
        public $LastName;
        public $password;
        public $FirstName;
        

         

        public static function find_all_user()
        {

            return self::find_this_query("select * from users");


        }
        public static function find_user_by_id($ID)
        {
            $result_array=self::find_this_query("select * from users where ID=$ID");
            $result=!empty($result_array)?array_shift($result_array):false;
            return $result;



        }
        private function find_this_query($sql)
        {

            global $database;
            $result_set=$database->query($sql);
            $the_object_array=array();
            while($row=mysqli_fetch_assoc($result_set))
            {
                $the_object_array[]=self::instantation($row);

            }
            return $the_object_array;


        }
        public static function  instantation($found_user)
        {

            $the_object=new self;

            foreach($found_user as $the_attribute => $value)
            {

                if($the_object->has_the_attribute($the_attribute))
                {

                    $the_object->$the_attribute=$value;

                }



            }
            return $the_object;




        }



        private function has_the_attribute($the_attribute){
            
            $object_properties=get_object_vars($this);

            return  array_key_exists($the_attribute,$object_properties);


        }


        //check the user exist in database
        public static function verify_user($username,$passwod)
        {
            global $database;

            //clean the input
            $username=$database->escape_string($username);
            $passwod=$database->escape_string($passwod);


            $sql="select * from users where UserName='$username' AND Password='$passwod'";
            $result_array=self::find_this_query($sql);
             
            return !empty($result_array)?array_shift($result_array):false;
            



        }
        public function create()
        {

            global $database;


            $sql="INSERT INTO users(username,Password,FirstName,LastName)";
            $sql.="values('";
            $sql.=$database->escape_string($this->username)."','";
            $sql.=$database->escape_string($this->password)."','";
            $sql.=$database->escape_string($this->FirstName)."','";
            $sql.=$database->escape_string($this->LastName)."')";

            if($database->query($sql)){
                $this->ID=$database->the_insert_id();
                return true;
            }
            else
            {
                return false;
            }


        }
        public function Update()
        {
            global $database;

            $sql="update users set ";
            $sql.="username= '".$database->escape_string($this->username)."',";
            $sql.="password='".$database->escape_string($this->password)."',";
            $sql.="firstname='".$database->escape_string($this->FirstName)."',";
            $sql.="lastname='".$database->escape_string($this->LastName)."'";
            $sql.=" Where ID=".$database->escape_string($this->ID);
           

            $database->query($sql);

            return (mysqli_affected_rows($database->connection) ==1) ? true : false;




        }
        public function delete()
        {
            global $database;
            $sql="Delete from users";
            $sql.=" where ID=".$database->escape_string($this->ID);
            $database->query($sql);

            return (mysqli_affected_rows($database->connection) ==1) ? true : false;


        }
      
        





    }
      














?>