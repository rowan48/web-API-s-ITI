<?php
use GuzzleHttp\Client;
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
    //use GuzzleHttp\Client;

    //put your code here
    public $arr=[];
    public $city;
    public $url="http://api.openweathermap.org/data/2.5/weather?q={{city}}&APPID=773014a8fbb5ebdabd5f9236a47af88b";



    public function __construct() {

    }

    public function get_cities() {
        //$arr =[];

        $json=file_get_contents("city.list.json");
        $data=json_decode($json,true);
        foreach($data as $vi ) {
            foreach($vi as $key => $value) {
                if ($value == "EG"){
                    $arr[]=$vi["name"];
                }
            }

        }
        return $arr;

    }
    public function get_weather($city)
    {

        // TODO: Implement get_weather() method.
        $this->url=str_replace("{{city}}",$city,$this->url);
        $client=new \GuzzleHttp\Client();
        $response=$client->get($this->url);
        return json_decode($response->getBody(),true);



//        if (isset($_POST["city"])) {
//            require_once("config.php");
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
//            if ($response) {
//                $decode_response = json_decode($response, true);
//                echo "The weather of " . $decode_response['name'] . " at " . date('d M Y') . " is " . ucwords($decode_response['weather'][0]['description']) . " <br>temperature is " . $decode_response['main']['temp'] . "<br>wind speed is " . $decode_response['wind']['speed'];
//                //echo "The weather of " . $decode_response['city_name_en'] . " at " . date('d M Y') . " is " . ucwords($decode_response['weather'][0]['description']);
//
//            } else {
//                echo "Error Get Data From Server!";
//                echo "<br>";
//                print_r($err);
//            }
//        }

    }


}
