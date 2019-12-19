<?php
    class Photo extends db_object{

        protected static $db_table="photos";//name of the user table 
        protected static $db_table_fields=['photo_id','title','description','filename','type','size'];
        public $photo_id;
        public $title;
        public $description;
        public $type;
        public $size;
        




        
    }






?>