<?php


class db_object{


    protected static $db_table="users";
    public static function find_all()
    {

        return static::find_by_query("select * from ".static::$db_table." ");


    }

    public static function find_by_id($ID)
    {
        $result_array=static::find_by_query("select * from ".static::$db_table."  where ".static::$search_table ."="."$ID");
        $result=!empty($result_array)?array_shift($result_array):false;
        return $result;



    }


    public function find_by_query($sql)
        {

            global $database;
            $result_set=$database->query($sql);
            $the_object_array=array();
            while($row=mysqli_fetch_assoc($result_set))
            {
                $the_object_array[]= static::instantation($row);

            }
            return $the_object_array;


        }
        public static function  instantation($found_user)
        {
            $calling_class=get_called_class();
            
            $the_object=new $calling_class;

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


       


        public function Update()
        {
            global $database;
            $the_porperties=$this->Properties();
            $reday_sql=array();
            foreach($the_porperties as $key=>$value)
            {

                $reday_sql[]="{$key}='$value'";

            }




            $sql="update " .static::$db_table." set ";
            $sql.=implode(',',$reday_sql);
            $sql.=" Where  ".static::$search_table." =".$database->escape_string($this->{static::$search_table});
           

            $database->query($sql);

            return (mysqli_affected_rows($database->connection) ==1) ? true : false;




        }
        public function delete()
        {
            global $database;
            $sql="Delete from " .static::$db_table."  ";
            $sql.="  where ".static::$search_table ."=".$database->escape_string($this->{static::$search_table});
            $database->query($sql);
            

            return (mysqli_affected_rows($database->connection) ==1) ? true : false;


        }

        public function Properties()
        {
            global $database;
            $Properties=[];
            foreach(static::$db_table_fields as $value)
            {
                if(property_exists($this,$value))
                {
                    $Properties[$value]=$database->escape_string($this->$value);

                }


            }


            return $Properties ;



        }





        public function create()
        {
            $the_porperties=$this->Properties();
        
            global $database;
            
            $sql="INSERT INTO " .static::$db_table."(".implode(',',array_keys($the_porperties)).")";
            $sql.=" values('".implode("','",array_values($the_porperties))."')";
            
            
            if($database->query($sql)){
                $this->{static::$search_table}=$database->the_insert_id();
                return true;
            }
            else
            {
                return false;
            }


        }
        public function save()
        {

            return isset($this->{static::$search_table}) ? $this->Update() :$this->create();

        }
    }
       





























?>