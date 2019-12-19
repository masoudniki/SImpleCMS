<?php
    class Photo extends db_object{

        protected static $db_table="photos";//name of the user table 
        protected static $db_table_fields=['photo_id','title','description','filename','type','size'];
        public $ID;
        public $title;
        public $description;
        public $type;
        public $size;
        




        
    }






?>