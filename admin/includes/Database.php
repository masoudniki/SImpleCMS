<?php
//inclue the config of connection to db you just need set it 
include_once("Newconfig.php");
//database class 
class Database
{
    // property that a handle to connect to database
    public $connection;

    //automaticaly connect to database when a instance of object created
    function __construct()
    {

        $this->open_db_connection();


    }


    //connect to db
    public function open_db_connection(){

        $this->connection=new mysqli(Address,username,passwoed,DB_NAME);
        if($this->connection->errno)
        {
            die("hey bitch we have a problem to connect to database".$this->connection->error);
        }
        


    }
    //excute the query
    public function query($sql){

        $reslut=$this->connection->query($sql);

        $this->Confrim_query($reslut);
        
        return $reslut;
    

    }
    //check the query excuted sucssefully
    protected function Confrim_query($reslut)
    {
        if(!$reslut)
        {
            die("we have a probelm ".$this->connection->error);
        }
        

    }
    // scape string to prevent sqli,and special character 

    public function escape_string($string)
    {
        
        $scaped_string=$this->connection->real_escape_string($string);

        return $scaped_string;
    }

    //get the auto generated id in the table
    public function the_insert_id()
    {
        return mysqli_insert_id($this->connection);

    }


}

$database=new Database();















?>