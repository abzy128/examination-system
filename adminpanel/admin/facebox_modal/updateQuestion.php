
<?php 
  include("../../../db/conn.php");
  $id = $_GET['id'];
 
  $selCourse = $conn->query("SELECT * FROM exam_questions WHERE eqt_id='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Изменение вопроса</i></legend>
  
  <div class="col-md-12 mt-4">
    <form method="post" id="updateQuestionFrm">
      <div class="form-group">
        <legend>Вопрос</legend>
        <input type="hidden" name="question_id" value="<?php echo $id; ?>">
        <textarea name="question" minlength="4" maxlength="64" class="form-control" rows="2" required=""><?php echo $selCourse['exam_question']; ?></textarea>
      </div>


      <div class="form-group">
        <legend>Вариант 1</legend>
        <input type="" maxlength="32" name="exam_ch1" value="<?php echo $selCourse['exam_ch1']; ?>" class="form-control" required>
      </div>
      <div class="form-group">
        <legend>Вариант 2</legend>
        <input type="" maxlength="32" name="exam_ch2" value="<?php echo $selCourse['exam_ch2']; ?>" class="form-control" required>
      </div>
      <div class="form-group">
        <legend>Вариант 3</legend>
        <input type="" maxlength="32" name="exam_ch3" value="<?php echo $selCourse['exam_ch3']; ?>" class="form-control" required>
      </div>
      <div class="form-group">
        <legend>Вариант 4</legend>
        <input type="" maxlength="32" name="exam_ch4" value="<?php echo $selCourse['exam_ch4']; ?>" class="form-control" required>
      </div>

      <div class="form-group">
        <legend class="text-success">Правильный ответ</legend>
        <input type="" maxlength="32" name="exam_answer" value="<?php echo $selCourse['exam_answer']; ?>" class="form-control" required>
      </div>


      <div class="form-group" align="right">
        <button type="submit" class="btn btn-sm btn-primary">Изменить</button>
      </div>
    </form>
  </div>
</fieldset>







