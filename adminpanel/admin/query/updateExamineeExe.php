<?php
 include("../../../db/conn.php");
 extract($_POST);


$updCourse = $conn->query("UPDATE students SET student_fullname='$exFullname', student_course='$exCourse', student_gender='$exGender', student_birthdate='$exBdate', student_year_level='$exYrlvl', student_email='$exEmail', student_password='$exPass', student_status='$newCourseName' WHERE student_id='$student_id' ");
if($updCourse)
{
	   $res = array("res" => "success", "exFullname" => $exFullname);
}
else
{
	   $res = array("res" => "failed");
}



 echo json_encode($res);	
?>