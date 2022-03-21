<?php
use GuzzleHttp\Client;
$client = new GuzzleHttp\Client();


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Weather
 *
 * @author webre
 */
class Weather implements Weather_Interface {

    //put your code here
    private $url;
    public $array=[];
    public $city;

    public function __construct() {

    }

    public function get_cities() {
        //$arr =[];

        $json=file_get_contents("city.list.json");
        $data=json_decode($json,true);
        foreach($data as $vi ) {
            foreach($vi as $key => $value) {
                if ($value == "EG"){
                    $array[]=$vi["name"];
                }
            }

        }
        return $array;

    }
    public function get_weather($arr)
    {

         $url="http://api.openweathermap.org/data/2.5/weather?q=".$_POST["city"]."&APPID=55ced2aa119199ca2e7bd7af662dbc6d";


           // $this->url=str_replace("{{cityid}}",$city_name,$this->url);
            $client=new \GuzzleHttp\Client();
            $response=$client->get($this->url);
             json_decode($response->getBody(),true);




        // TODO: Implement get_weather() method.
        if (isset($_POST["city"])) {
            //require_once("config.php");
            //require_once ("vendor/autoload.php");
            $url="http://api.openweathermap.org/data/2.5/weather?q=".$_POST["city"]."&APPID=55ced2aa119199ca2e7bd7af662dbc6d";
            $client=new \GuzzleHttp\Client();
            $response=$client->get($this->url);
            $decode_response=json_decode($response->getBody(),true);
            echo "The weather of " . $decode_response['name'] . " at " . date('d M Y') . " is " . ucwords($decode_response['weather'][0]['description']) . " <br>temperature is " . $decode_response['main']['temp'] . "<br>wind speed is " . $decode_response['wind']['speed'];



            //$response = GuzzleHttp\Client()->request('GET', "http://api.openweathermap.org/data/2.5/weather?q=".$_POST["city"]."&APPID=55ced2aa119199ca2e7bd7af662dbc6d");

//            $url = __WEATHER_URL;
//            $curl_opt = array(
//                CURLOPT_URL => $url,
//                CURLOPT_RETURNTRANSFER => true,
//                CURLOPT_ENCODING => "",
//                CURLOPT_MAXREDIRS => 10,
//                CURLOPT_TIMEOUT => 10,
//                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                CURLOPT_CUSTOMREQUEST => 'GET',
//                CURLOPT_HTTPHEADER => array("content-type: application/x-www-form-urlencoded"),
//            );
//            $curl = curl_init();
//            curl_setopt_array($curl, $curl_opt);
//            $response = curl_exec($curl);
//            $err = curl_error($curl);


//
//                if (200 == $response->getStatusCode()) {
//                    $body = $response->getBody();
//                    $decode_response = json_decode($body,true);
//                    echo "The weather of " . $decode_response['name'] . " at " . date('d M Y') . " is " . ucwords($decode_response['weather'][0]['description']) . " <br>temperature is " . $decode_response['main']['temp'] . "<br>wind speed is " . $decode_response['wind']['speed'];
//
//                    //print_r($decode_response);
//                }
//                else{
//                    echo"error in server";
//                }



            if ($response) {
              //  $response = json_decode($response, true);
                //==echo $response->getStatusCode();
// "200"
               //== echo $response->getHeader('content-type')[0];
// 'application/json; charset=utf8'
               // echo $response->getBody();
// {"type":"User"...'

                // echo "The weather of " . $decode_response['name'] . " at " . date('d M Y') . " is " . ucwords($decode_response['weather'][0]['description']) . " <br>temperature is " . $decode_response['main']['temp'] . "<br>wind speed is " . $decode_response['wind']['speed'];
                //echo "The weather of " . $decode_response['city_name_en'] . " at " . date('d M Y') . " is " . ucwords($decode_response['weather'][0]['description']);

            } else {
                echo "Error Get Data From Server!";
            }
        }

    }


}
