<?php
//require_once ("../autoload.php");

class Weatherguzzle
{

    public $url="http://api.openweathermap.org/data/2.5/weather?q={{city}}&units=metric&APPID=773014a8fbb5ebdabd5f9236a47af88b";

    public function get_weather_guzzle($city){
        $this->url=str_replace("{{city}}",$city,$this->url);
        $client=new \GuzzleHttp\Client();
        $response=$client->get($this->url);
        $val=json_decode($response->getBody(),true);
        return json_decode($response->getBody(),true);

    }

}