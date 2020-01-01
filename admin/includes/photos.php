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