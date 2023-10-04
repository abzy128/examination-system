<?php 

// Starting PHP session and including database connection configurations (like host, user, password and database name).
session_start();
 include("../db/conn.php");

// Extracting data from global variable
extract($_POST);

// SQL query for selecting only account with matching email and password
$selAcc = $conn->query("SELECT * FROM students WHERE student_email='$username' AND student_password='$password'");
$selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);

// Checking if there are any accounts in the database with matching email and password
if($selAcc->rowCount() > 0)
{
  $_SESSION['examineeSession'] = array(
  	 'student_id' => $selAccRow['student_id'],
  	 'examineenakalogin' => true
  );
  $res = array("res" => "success");

}
else
{
  $res = array("res" => "invalid");
}
 echo json_encode($res);
 ?>


