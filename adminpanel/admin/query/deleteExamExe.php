<?php 
 include("../../../db/conn.php");


extract($_POST);

$delExam = $conn->query("DELETE  FROM exams WHERE ex_id='$id'  ");
if($delExam)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}


	echo json_encode($res);
 ?>