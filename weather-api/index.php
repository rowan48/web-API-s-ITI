<?php
//require_once ("config.php");
require("autoload.php");
ini_set('memory_limit', '-1');
$weather = new Weather();
$arr = $weather->get_cities();
if (isset($_POST["city"])) {
    $weather->get_weather();

}

//$arr =[];
//$json=file_get_contents("city.list.json");
//$data=json_decode($json,true);
//foreach($data as $vi ) {
//    foreach($vi as $key => $value) {
//        //echo $key . " => " . $value . "<br>";
//        if ($value == "EG"){
//            $arr[]=$vi["name"];
//            //snippets--pdp
//            //var_dump($arr);
//
//        }
//    }
//
//}
//
//for($i=0;$i<count($arr);$i++){
//    // echo "$arr[$i]"."<br>";
/*    highlight_string('<?php ' . var_export($arr, true) . ';?>');*/
//    //die();
//}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>	Check Weather</title>
</head>
<body>
	<form action="#" method="post">
        <select name="city" >
		<?php
            for($i=0;$i<count($arr);$i++){?>
                <option value="<?php echo $arr[$i]?>"><?php echo $arr[$i]?></option><?php }?>
        </select>
            <button type="submit" name="submit">Submit</button>
        <form>
<!--            --><?php //require "action.php" ?>
</body>
</html>
