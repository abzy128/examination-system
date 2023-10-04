<?php 
 include("../../../db/conn.php");


extract($_POST);

$delCourse = $conn->query("DELETE  FROM courses WHERE cou_id='$id'  ");
if($delCourse)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}



	echo json_encode($res);
 ?>