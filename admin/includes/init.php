<?php
    defined('DS') ? null : define("DS",DIRECTORY_SEPARATOR);
    define("SITE_ROOT","C:".DS."xampp".DS."htdocs".DS."Gallery");
    defined('INCLUDES_PATH') ? null :define("INCLUDES_PATH",SITE_ROOT.DS.'admin'.DS."includes");
    require_once("db_object.php");
    require_once("function.php");
    require_once("Newconfig.php");
    require_once("Database.php");
    require_once("user.php");
    require_once("session.php");
    require_once("photos.php");
    require_once("comment.php");






?>