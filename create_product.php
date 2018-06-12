<?php
$response = array();

if (isset($_POST['Latitude']) && isset($_POST['Longitude']) && isset($_POST['Apikey']) && isset($_POST['IMEI'])) {

    $lat = $_POST['Latitude'];
    $long = $_POST['Longitude'];
    $apikey = $_POST['Apikey'];
    $imei = $_POST['IMEI'];

    require_once __DIR__ . '/db_connect.php';

    $db = new DB_CONNECT();

// Insert Original Credentials
    $con = mysqli_connect("localhost","my_user","my_password","my_db");
    mysqli_select_db($con,'my_user');

    $result = mysqli_query($con,"INSERT INTO latlong(Latitude,Longitude,Apikey,IMEI) VALUES('$lat','$long','$apikey','$imei')");

    if ($result) {

        $response["success"] = 1;
        $response["message"] = "Product successfully created.";

        echo json_encode($response);

    } else {

        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";

        echo json_encode($response);
    }
} else {

    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    echo json_encode($response);
}
?>
