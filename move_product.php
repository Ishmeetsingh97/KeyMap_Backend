<?php

$response = array();

if (isset($_POST['IMEI'])) {
    $IMEI = $_POST['IMEI'];
    require_once __DIR__ . '/db_connect.php';
    $db = new DB_CONNECT();
    // Insert Original Credentials
        $con = mysqli_connect("localhost","my_user","my_password","my_db");
        mysqli_select_db($con,'my_user');
        
    $result = mysqli_query($con,"INSERT INTO history select * from latlong where IMEI = $IMEI;");
    $result1 = mysqli_query($con,"DELETE FROM latlong where IMEI = $IMEI;");
  }


?>
