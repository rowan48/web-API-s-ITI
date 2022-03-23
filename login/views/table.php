<?php

echo "<table border='1'>";
$record_index = 0;
foreach ($all_requrds as $item) {//$all_requrds
    if ($record_index === 0) {
        echo "<tr>";
        echo "<td> Name </td>";
        echo "<td> Price </td>";
        echo "<td> Country </td>";
        echo "<td>Units_In_Stock</td>";
        echo "<td> image</td>";
        echo "<td> visit</td>";

        echo "</tr>";
    }
    echo "<tr>";
    $image =explode(".",$item->Photo);
    $image=$image[0]."tz".".png";
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $actual_link=explode("?",$actual_link);
    $details=$actual_link[0]. "?glass=" .$item->id;
    echo "<td>".$item->product_name ."</td>";
    echo "<td>".$item->list_price ."</td>";
    echo "<td>".$item->CouNtry ."</td>";
    echo "<td>".$item->Units_In_Stock."</td>";
    echo"<td><img src='images/".$image."'></td>";
    echo"<td><a href='".$details."'>more</a></td>";

    echo "</tr>";

    $record_index ++;
}
echo "</table>";
?>
<div>
    <a href="<?php //echo $previous_link;  ?>"> << Prev </a> | <a href="<?php// echo $next_link;  ?>">  Next >> </a>
</div>




