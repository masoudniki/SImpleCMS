<?php

    class session{

        private $signed_in=false;
        public $user_id;
        public $count;


        function __construct()
        {
            session_start();
            $this->visitor_cout();
            $this->check_the_login();
        }
        public function visitor_cout()
        {
            if(isset($_SESSION['count']))
            {
                $this->count=$_SESSION['count']+=1;
            }else{
                $this->count=$_SESSION['count']=1;
            }

        }

        public function is_signed_in()
        {
            return $this->signed_in;
        }



        public function login($user)
        {

             if($user)
             {
                $this->user_id=$_SESSION['ID']=$user->ID;
                $this->signed_in=true;


             }      



        }
        public function logout()
        {

            unset($_SESSION['ID']);
            unset($this->user_id);
            $this->signed_in=false; 



        }

        private function check_the_login(){

            if(isset($_SESSION['ID']))
            {
                $this->user_id=$_SESSION['ID'];
                $this->signed_in=true;
            }
            else{
                unset($this->user_id);
                $this->signed_in=false;
            }

        }
        public function set_notification($type,$Msg)
        {

            
                $_SESSION['notification']=[
                    
                        "type"=>$type,
                        "message"=>$Msg
                    
                    ];


            
        }
        public function delet_notificaion()
        {
            unset($_SESSION['notification']);
        }
        public function notificationExist()
        {
            if(isset($_SESSION['notification']))
            {
                return true;
            }
            else{
                return false;
            }


        }
        public function notiGetType()
        {
            if($this->notificationExist())
            {
                return $_SESSION['notification']['type'];
            }
        }
        public function notiGetMsg()
        {
            if($this->notificationExist())
            {
                return $_SESSION['notification']['message'];
            }
        }


        
    }

    $session=new session();










?>