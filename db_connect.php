<?php
class DB_CONNECT {

    function __construct() {
        $this->connect();
    }
        function connect() {
        require_once __DIR__ . '/db_config.php';
       $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysqli_error($con));
       $db = mysqli_select_db($con,DB_DATABASE) or die(mysqli_error($con)) or die(mysqli_error($con));
      return $con;

    }

}

?>
