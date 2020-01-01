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
        public $custom_err=array();
        
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
        public function set_file($file)
        {
            if(empty($file) || !$file || !is_array($file))
            {
                $this->custom_err[]="There was no file uploded here";
                return false;

            }
            elseif($file['error']!=0)
            {

                $this->custom_err[]=$this->Erorr_Upload_file[$file['error']];
                return false;

            }
            else
            {
                $this->user_image   =basename($file['name']);
                $this->tmp_path   =$file['tmp_name'];
                $this->type       =$file['type'];
                $this->size       =$file['size'];

            }





        }
        public function save_user_and_image()
        {

           

                if(!empty($this->custom_err))
                {
                    
                    return false;
                }
                if(empty($this->user_image) || empty($this->tmp_path) )
                {
                    $this->error[]="the file was not available";
                    return false;
                }

                $target_path=SITE_ROOT.DS."admin".DS.$this->up_dir.DS.$this->user_image;

                if(file_exists($target_path))
                {
                   
                    $this->custom_err[]="the file {$this->user_image} already exist";
                    return false;
                }

                if(move_uploaded_file($this->tmp_path,$target_path))
                {
                    if($this->Update())
                    {
                        unset($this->tmp_path);
                        return true;
                    }
                }

                else{

                    $this->custom_err[]="the file directory probably does not have permisson";
                    return false;
                }


            }

    





      
      
        





    }
      



    










?>