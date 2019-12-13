<?php

    class session{

        private $signed_in=false;
        public $user_id;

        function __construct()
        {
            session_start();
            $this->check_the_login();
        }

        public function is_signed_in()
        {
            return $this->signed_in;
        }



        public function login($user)
        {

             if($user)
             {
                $this->user_id=$_SESSION['user_id']['ID']=$user->ID;
                $this->signed_in=true;


             }      



        }
        public function logout()
        {

            unset($_SESSION['user_id']);
            unset($this->user_id);
            $this->signed_in=false; 



        }

        private function check_the_login(){

            if(isset($_SESSION['user_id']))
            {
                $this->user_id=$_SESSION['user_id']['ID'];
                $this->signed_in=true;
            }
            else{
                unset($this->user_id);
                $this->signed_in=false;
            }

        }
        public function set_notification($type,$Msg)
        {

            if(isset($_SESSION['user_id']))
            {
                $_SESSION['user_id']+=[
                    'notification'=>[
                        "type"=>$type,
                        "message"=>$Msg
                    ]
                    ];


            }
        }
        public function delet_notificaion()
        {
            unset($_SESSION['user_id']['notification']);
        }
        public function notificationExist()
        {
            if(isset($_SESSION['user_id']['notification']))
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
                return $_SESSION['user_id']['notification']['type'];
            }
        }
        public function notiGetMsg()
        {
            if($this->notificationExist())
            {
                return $_SESSION['user_id']['notification']['message'];
            }
        }


        
    }

    $session=new session();










?>