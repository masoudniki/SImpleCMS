<?php

    class comment extends db_object{

        protected static $db_table="comment";//name of the user table 
        protected static $db_table_fields=['ID','photo_id','author','body'];
        protected static $search_table="ID";
        public $ID;
        public $photo_id;
        public $author;
        public $body;
        public $Erorr_Upload_file='';

        public static function create_comment($photo_id,$author="masoudniki",$body="")
        {
            if(!empty($photo_id) && !empty($author) && !empty($body))
            {

                $comment=new comment();



                $comment->photo_id     =(int)$photo_id;
                $comment->author       =$author;
                $comment->body         =$body;

                return $comment;



            }
            else{


                return false;
            }
            


        }
        public static function find_the_comment($photo_id=0)
        {
            global $database;

            $sql="select * from ".self::$db_table;
            $sql.= " where photo_id =" .$database->escape_string($photo_id);
            $sql.= " order by photo_id ASC";
            

            return self::find_by_query($sql);
        }



       
      
        





    }
      



    










?>