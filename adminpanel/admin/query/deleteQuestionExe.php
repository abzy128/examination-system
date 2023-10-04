<?php 
 include("../../../db/conn.php");


extract($_POST);

$delExam = $conn->query("DELETE  FROM exam_questions WHERE eqt_id='$id'  ");
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