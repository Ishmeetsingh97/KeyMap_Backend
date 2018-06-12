<?php
$response = array();
require_once __DIR__ . '/db_connect.php';
$db = new DB_CONNECT();

if (isset($_GET['Apikey'])) {
    $Apikey = $_GET['Apikey'];

    // Insert Original Credentials
        $con = mysqli_connect("localhost","my_user","my_password","my_db");
        mysqli_select_db($con,'my_user');
        
    $query = "SELECT * FROM latlong WHERE Apikey='$Apikey'";
    $row = mysqli_query($con,$query);

    if (!empty($row)) {

        $product = array();
        $response["Coordinates"] = array();

        while($result =  mysqli_fetch_array($row)){

            $product["id"] = $result["id"];
            $product["Latitude"] = $result["Latitude"];
            $product["Longitude"] = $result["Longitude"];
            $product["Apikey"] = $result["Apikey"];
            $product["IMEI"] = $result["IMEI"];

            $response["success"] = 1;
            array_push($response["Coordinates"], $product);
          }
          echo json_encode($response);

    } else {

        $response["success"] = 0;
        $response["message"] = "Error2";

        echo json_encode($response);
    }
} else {

    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    echo json_encode($response);
}
?>
