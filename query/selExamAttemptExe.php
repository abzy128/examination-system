<?php 
 session_start();
 include("../conn.php");
$studentId = $_SESSION['examineeSession']['student_id'];
 

extract($_POST);

 $selExamAttmpt = $conn->query("SELECT * FROM exam_attempts WHERE student_id='$studentId' AND exam_id='$thisId' ");

 if($selExamAttmpt->rowCount() > 0)
 {
 	$res = array("res" => "alreadyExam", "msg" => $thisId);
 }
 else
 {
 	$res = array("res" => "takeNow");
 }


 echo json_encode($res);
 ?>