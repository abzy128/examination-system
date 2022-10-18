<?php 
$studentId = $_SESSION['examineeSession']['student_id'];

// Selecting all students with matching ID
$selStudenteData = $conn->query("SELECT * FROM students WHERE student_id='$studentId' ")->fetch(PDO::FETCH_ASSOC);
$studentCourse =  $selStudenteData['student_course'];


        
// Query for getting exams with matching course
$selExam = $conn->query("SELECT * FROM exams WHERE cou_id='$studentCourse' ORDER BY ex_id DESC ");


//

 ?>