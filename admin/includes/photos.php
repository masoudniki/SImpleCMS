<?php
    class Photo extends db_object{

        protected static $db_table="photos";//name of the user table 
        protected static $db_table_fields=['photo_id','title','description','filename','type','size','caption','alternatetext'];
        protected static $search_table="photo_id";
        public $photo_id;
        public $title;
        public $description;
        public $type;
        public $size;
        public $filename;
        public $save_image_directory="Images";
        public $tmp_path;
        public $AlternateText;
        public $Caption;
        public $custom_err=array();
        public   $Erorr_Upload_file=
        [
            UPLOAD_ERR_OK           =>"There is no error, the file uploaded with success.",
            UPLOAD_ERR_INI_SIZE     =>"The uploaded file exceeds the upload_max_filesize directive in php.ini.",
            UPLOAD_ERR_FORM_SIZE    =>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
            UPLOAD_ERR_PARTIAL      =>"The uploaded file was only partially uploaded.",
            UPLOAD_ERR_NO_FILE      =>"No file was uploaded. ",
            UPLOAD_ERR_NO_TMP_DIR   =>"Missing a temporary folder. Introduced in PHP 5.0.3. ",
            UPLOAD_ERR_CANT_WRITE   =>"Failed to write file to disk. Introduced in PHP 5.1.0. ",
            UPLOAD_ERR_EXTENSION    =>"A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help. Introduced in PHP 5.2.0. "
        ];
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
                $this->filename   =basename($file['name']);
                $this->tmp_path   =$file['tmp_name'];
                $this->type       =$file['type'];
                $this->size       =$file['size'];

            }





        }
        public function save()
        {

            if($this->photo_id)
            {

                $this->Update();

            }
            else{

                if(!empty($this->custom_err))
                {
                    return false;
                }
                if(empty($this->filename) || empty($this->tmp_path) )
                {
                    $this->error[]="the file was not available";
                    return false;
                }

                $target_path=SITE_ROOT.DS."admin".DS.$this->save_image_directory.DS.$this->filename;

                if(file_exists($target_path))
                {
                    $this->custom_err[]="the file {$this->filename} already exist";
                    return false;
                }

                if(move_uploaded_file($this->tmp_path,$target_path))
                {
                    if($this->create())
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
        public function GetPicPath()
        {
            return $this->save_image_directory.DS.$this->filename;
            
        }


        public function delete_photo()
        {
           if($this->delete())
           {

            $target_path=SITE_ROOT.DS."admin".DS.$this->GetPicPath(); 

            return unlink($target_path)?true:false;

           }   
           else{

            return false;


           }

        }





        
    }






?>