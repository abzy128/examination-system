<?php 
	session_start();
 include("../db/conn.php");
 extract($_POST);

$studentSess = $_SESSION['examineeSession']['student_id'];

$selMyFeedbacks = $conn->query("SELECT * FROM feedbacks WHERE student_id='$studentSess' ");

if($selMyFeedbacks->rowCount() >= 10)
{
 	$res = array("res" => "limit");
}
else if(strlen($myFeedbacks)==0){
	$res = array("res" => "presence");
}
else
{
	// Getting current date
 	$date = date("F d, Y");
	 // Inserting new feedback to databse
 	$insFedd = $conn->query("INSERT INTO feedbacks(student_id,fb_student_as,fb_feedbacks,fb_date) VALUES('$studentSess','$asMe','$myFeedbacks','$date') ");

 	if($insFedd)
 	{
 		$res = array("res" => "success");
 	}
 	else
 	{
 		$res = array("res" => "failed");
	}
}


 echo json_encode($res);
 ?>