<?php
$id=$_GET["glass"];
if (Illuminate\Database\Capsule\Manager::table('items')->where('id',$id)->exists()){
    $glass=Illuminate\Database\Capsule\Manager::table("items")->where('id',$id)->first();
}else{
    die("Glass not exist");
}
?>
<html>
<h5>name: <?php echo $glass->product_name ;?></h5>
<h5>country: <?php echo $glass->CouNtry ;    ?></h5>
<h5>image:  <img src="images/<?php echo $glass->Photo; ?>"> </h5>
</html>
