<?php
define("api_key ", "55ced2aa119199ca2e7bd7af662dbc6d");
define("__WEATHER_URL","http://api.openweathermap.org/data/2.5/weather?q=".$_POST["city"]."&APPID=".api_key);
define("__CITIES_FILE", "resources/city.list.json");
