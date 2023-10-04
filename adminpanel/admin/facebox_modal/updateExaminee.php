
<?php 
  include("../../../db/conn.php");
  $id = $_GET['id'];
 
  $selStudent = $conn->query("SELECT * FROM students WHERE student_id='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Изменение <b>( <?php echo strtoupper($selStudent['student_fullname']); ?> )</b></i></legend>
  <div class="col-md-12 mt-4">
<form method="post" id="updateExamineeFrm">
     <div class="form-group">
        <legend>Полное имя</legend>
        <input type="hidden" name="student_id" value="<?php echo $id; ?>">
        <input type="" name="exFullname" class="form-control" required="" value="<?php echo $selStudent['student_fullname']; ?>" >
     </div>

     <div class="form-group">
        <legend>Пол</legend>
        <select class="form-control" name="exGender">
          <option value="<?php echo $selStudent['student_gender']; ?>"><?php echo $selStudent['student_gender']; ?></option>
          <option value="Мужской">Мужской</option>
          <option value="Женский">Женский</option>
        </select>
     </div>

     <div class="form-group">
        <legend>День рождения</legend>
        <input type="date" name="exBdate" class="form-control" required="" value="<?php echo date('Y-m-d',strtotime($selStudent["student_birthdate"])) ?>"/>
     </div>

     <div class="form-group">
        <legend>Учебная программа</legend>
        <?php 
            $studentCourse = $selStudent['student_course'];
            $selCourse = $conn->query("SELECT * FROM courses WHERE cou_id='$studentCourse' ")->fetch(PDO::FETCH_ASSOC);
         ?>
         <select class="form-control" name="exCourse">
           <option value="<?php echo $studentCourse; ?>"><?php echo $selCourse['cou_name']; ?></option>
           <?php 
             $selCourse = $conn->query("SELECT * FROM courses WHERE cou_id!='$studentCourse' ");
             while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
            <?php  }
            ?>
         </select>
     </div>

     <div class="form-group">
        <legend>Класс</legend>
        <select class="form-control" name="exYrlvl">
          <option value="<?php echo $selStudent['student_year_level']; ?>"><?php echo $selStudent['student_year_level']; ?></option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
        </select>
     </div>

     <div class="form-group">
        <legend>Эл. Почта</legend>
        <input type="" name="exEmail" class="form-control" required="" value="<?php echo $selStudent['student_email']; ?>" >
     </div>

     <div class="form-group">
        <legend>Пароль</legend>
        <input type="" name="exPass" class="form-control" required="" value="<?php echo $selStudent['student_password']; ?>" >
     </div>

     <div class="form-group">
        <legend>Статус</legend>
        <select class="form-control" name="newCourseName">
          <option value="<?php echo $selStudent['student_status']; ?>"><?php echo $selStudent['student_status']; ?></option>
          <option value="Активен">Активен</option>
          <option value="Неактивен">Неактивен</option>
        </select>
     </div>
  <div class="form-group" align="right">
    <button type="submit" class="btn btn-sm btn-primary">Изменить</button>
  </div>
</form>
  </div>
</fieldset>







