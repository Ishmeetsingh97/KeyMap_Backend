<?php
$response = array();

require_once __DIR__ . '/db_connect.php';

$db = new DB_CONNECT();

// Insert Original Credentials
$con = mysqli_connect("localhost","my_user","my_password","my_db");
mysqli_select_db($con,'my_user');

$query = "SELECT * FROM latlong";
$result = mysqli_query($con,$query) or die(mysqli_error($con));

if (mysqli_num_rows($result) > 0) {

    $response["Coordinates"] = array();

    while ($row = mysqli_fetch_array($result)) {
        $product = array();

        $product["id"] = $row["id"];
        $product["Latitude"] = $row["Latitude"];
        $product["Longitude"] = $row["Longitude"];
        $product["Apikey"] = $row["Apikey"];
        $product["IMEI"] = $row["IMEI"];

        array_push($response["Coordinates"], $product);
    }

    echo json_encode($response);
} else {

    $response["success"] = 0;
    $response["message"] = "No Coordinates found";

    $response= mysqli_set_charset($con,'utf-8');
    echo json_encode($response);
}
?>
