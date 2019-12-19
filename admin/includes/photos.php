<?php
    class Photo extends db_object{

        protected static $db_table="photos";//name of the user table 
        protected static $db_table_fields=['photo_id','title','description','filename','type','size'];
        public $photo_id;
        public $title;
        public $description;
        public $type;
        public $size;
        public $filename;
        
        public $tmp_path;
        public $custom_err=array();
        public   $Erorr_Upload_file=
        [
            UPLOAD_ERR_OK           =>"There is no error, the file uploaded with success.",
            UPLOAD_ERR_INI_SIZE     =>"The uploaded file exceeds the upload_max_filesize directive in php.ini.",
            UPLOAD_ERR_FORM_SIZE    =>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
            UPLOAD_ERR_PARTIAL      =>"The uploaded file was only partially uploaded.",
            UPLOAD_ERR_NO_FILE      =>"No file was uploaded. ",
            5=>null,
            UPLOAD_ERR_NO_TMP_DIR   =>"Missing a temporary folder. Introduced in PHP 5.0.3. ",
            UPLOAD_ERR_CANT_WRITE   =>"Failed to write file to disk. Introduced in PHP 5.1.0. ",
            UPLOAD_ERR_EXTENSION    =>"A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help. Introduced in PHP 5.2.0. "
        ];
        




        
    }






?>