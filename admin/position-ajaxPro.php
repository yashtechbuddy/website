<?php 

include("includes/connection.php");

$position = $_POST['position'];
$table_name = $_POST['dataBase'];


$i=1;
foreach($position as $k=>$v){
    $sql = "Update ".$table_name." SET position_order=".$i." WHERE id=".$v;
    $mysqli->query($sql);


	$i++;
}


?>