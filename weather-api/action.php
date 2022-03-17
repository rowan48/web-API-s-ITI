<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <title>	Check Weather</title>-->
<!--    <link rel="stylesheet" href="">-->
<!--</head>-->
<!--<body>-->
<?php
//$api_key = "55ced2aa119199ca2e7bd7af662dbc6d";
//$url="http://api.openweathermap.org/data/2.5/weather?q=".$_POST["city"]."&APPID=".$api_key;
$url=__WEATHER_URL;
$curl_opt = array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 10,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array("content-type: application/x-www-form-urlencoded"),
    //CURLOPT_HTTPHEADER => array("content-type: application/x-www-form-urlencoded"),
);
$curl = curl_init();
curl_setopt_array($curl, $curl_opt);
$response = curl_exec($curl);
$err = curl_error($curl);
if($response){
    $decode_response = json_decode($response, true);
    echo "The weather of " . $decode_response['name'] . " at " . date('d M Y') . " is " . ucwords($decode_response['weather'][0]['description'])." <br>temperature is ".$decode_response['main']['temp']."<br>wind speed is ".$decode_response['wind']['speed'];
    //echo "The weather of " . $decode_response['city_name_en'] . " at " . date('d M Y') . " is " . ucwords($decode_response['weather'][0]['description']);

}else{
    echo"Error Get Data From Server!";
    echo"<br>";
    print_r($err);
}
?>
</body>
</html>