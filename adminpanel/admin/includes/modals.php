<!-- Modal For Add Course -->
<div class="modal fade" id="modalForAddCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addCourseFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Учебная программа</label>
            <input type="" name="course_name" id="course_name" class="form-control" placeholder="Input Course" required="" autocomplete="off">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Update Course -->
<div class="modal fade myModal" id="updateCourse-<?php echo $selCourseRow['cou_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
     <form class="refreshFrm" id="addCourseFrm" method="post" >
       <div class="modal-content myModal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Изменить ( <?php echo $selCourseRow['cou_name']; ?> )</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Программа</label>
              <input type="" name="course_name" id="course_name" class="form-control" value="<?php echo $selCourseRow['cou_name']; ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
      </div>
     </form>
    </div>
  </div>


<!-- Modal For Add Exam -->
<div class="modal fade" id="modalForExam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addExamFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить тест</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Выберите учебную программу</label>
            <select class="form-control" name="courseSelected">
              <option value="0">Выберите учебную программу</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM courses ORDER BY cou_id DESC");
                if($selCourse->rowCount() > 0)
                {
                  while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                  <?php }
                }
                else
                { ?>
                  <option value="0">Программы не найдены</option>
                <?php }
               ?>
            </select>
          </div>

          <div class="form-group">
            <label>Лимит времени</label>
            <select class="form-control" name="timeLimit" required="">
              <option value="0">Выберите время</option>
              <option value="10">10 минут</option> 
              <option value="20">20 минут</option> 
              <option value="30">30 минут</option> 
              <option value="40">40 минут</option> 
              <option value="50">50 минут</option> 
              <option value="60">60 минут</option> 
            </select>
          </div>

          <div class="form-group">
            <label>Лимит вопросов</label>
            <input type="number" min="1" max="99" name="examQuestDipLimit" id="" class="form-control" placeholder="Введите лимит вопросов в тесте" required>
          </div>

          <div class="form-group">
            <label>Название теста</label>
            <input type="" name="examTitle" class="form-control" placeholder="Введите название теста" required="">
          </div>

          <div class="form-group">
            <label>Описание теста</label>
            <textarea name="examDesc" class="form-control" rows="4" placeholder="Введите описание" required=""></textarea>
          </div>


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Add Student -->
<div class="modal fade" id="modalForAddExaminee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addExamineeFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить ученика</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Полное имя</label>
            <input type="" name="fullname" id="fullname" class="form-control" placeholder="Input Fullname" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Дата рождения</label>
            <input type="date" name="bdate" id="bdate" class="form-control" placeholder="Input Birhdate" autocomplete="off" >
          </div>
          <div class="form-group">
            <label>Пол</label>
            <select class="form-control" name="gender" id="gender">
              <option value="0">Выберите пол</option>
              <option value="Мужской">Мужской</option>
              <option value="Женский">Женский</option>
            </select>
          </div>
          <div class="form-group">
            <label>Course</label>
            <select class="form-control" name="course" id="course">
              <option value="0">Выберите учебную программу</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM courses ORDER BY cou_id asc");
                while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                  <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                <?php }
               ?>
            </select>
          </div>
          <div class="form-group">
            <label>Year Level</label>
            <select class="form-control" name="year_level" id="year_level">
              <option value="0">Выберите класс</option>
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
            <label>Эл. почта</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Введите почту" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Пароль</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Введите пароль" autocomplete="off" required="">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </div>
   </form>
  </div>
</div>



<!-- Modal For Add Question -->
<div class="modal fade" id="modalForAddQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addQuestionFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавление вопроса в <br><?php echo $selExamRow['ex_title']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="refreshFrm" method="post" id="addQuestionFrm">
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Вопрос</label>
            <input type="hidden" name="examId" value="<?php echo $exId; ?>">
            <input type="" required minlength="4" maxlength="64" name="question" id="course_name" class="form-control" placeholder="" autocomplete="off">
          </div>

          <fieldset>
            <legend>Введите варианты ответа</legend>
            <div class="form-group">
                <label>Первый вариант</label>
                <input type="" required maxlength="32" name="choice_A" id="choice_A" class="form-control" placeholder="" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Второй вариант</label>
                <input type="" required maxlength="32" name="choice_B" id="choice_B" class="form-control" placeholder="" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Третий вариант</label>
                <input type="" required maxlength="32" name="choice_C" id="choice_C" class="form-control" placeholder="" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Четвёртый вариант</label>
                <input type="" required maxlength="32" name="choice_D" id="choice_D" class="form-control" placeholder="" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Правильный ответ</label>
                <input type="" required maxlength="32" name="correctAnswer" id="" class="form-control" placeholder="" autocomplete="off">
            </div>
          </fieldset>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
      </form>
    </div>
   </form>
  </div>
</div>