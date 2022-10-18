<?php 

// Count All Course
$selCourse = $conn->query("SELECT COUNT(cou_id) as totCourse FROM courses ")->fetch(PDO::FETCH_ASSOC);

// Count All Exam
$selExam = $conn->query("SELECT COUNT(ex_id) as totExam FROM exams ")->fetch(PDO::FETCH_ASSOC);

// Count All Students
$selStudent = $conn->query("SELECT COUNT(student_id) as totStudent FROM students")->fetch(PDO::FETCH_ASSOC);

 ?>
 