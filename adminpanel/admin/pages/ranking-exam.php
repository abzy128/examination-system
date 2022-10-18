<div class="app-main__outer">
        <div class="app-main__inner">
             


            <?php 
                @$exam_id = $_GET['exam_id'];


                if($exam_id != "")
                {
                   $selEx = $conn->query("SELECT * FROM exams WHERE ex_id='$exam_id' ")->fetch(PDO::FETCH_ASSOC);
                   $exam_course = $selEx['cou_id'];

                   

                   $selStudent = $conn->query("SELECT * FROM students et  WHERE student_course='$exam_course'  ");


                   ?>
                   <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div><b class="text-primary">Ранжированный список</b><br>
                                Экзамен : <?php echo $selEx['ex_title']; ?><br><br>
                               <span class="border" style="padding:10px;color:black;background-color: yellow;">Отлично</span>
                               <span class="border" style="padding:10px;color:white;background-color: green;">Очень хорошо</span>
                               <span class="border" style="padding:10px;color:white;background-color: blue;">Хорошо</span>
                               <span class="border" style="padding:10px;color:white;background-color: red;">Провал</span>
                               <span class="border" style="padding:10px;color:black;background-color: #E9ECEE;">Нет ответвов</span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                          <tbody>
                            <thead>
                                <tr>
                                    <th width="25%">Имя студента</th>
                                    <th>Баллы / Макс</th>
                                    <th>Процент</th>
                                </tr>
                            </thead>
                            <?php 
                                // Loop that cycles through all exam results and assigns corresponding color
                                while ($selStudentRow = $selStudent->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <?php 
                                            $studentId = $selStudentRow['student_id'];
                                            $selScore = $conn->query("SELECT * FROM exam_questions eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$studentId' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ORDER BY ea.exans_id DESC");

                                              $selAttempt = $conn->query("SELECT * FROM exam_attempts WHERE student_id='$studentId' AND exam_id='$exam_id' ");

                                             $over = $selEx['ex_questlimit_display']  ;    


                                              @$score = $selScore->rowCount();
                                                @$ans = $score / $over * 100;

                                         ?>
                                       <tr style="<?php
                                              // Checking precentage and assigning color 
                                             if($selAttempt->rowCount() == 0)
                                             {
                                                echo "background-color: #E9ECEE;color:black";
                                             }
                                             else if($ans >= 90)
                                             {
                                                echo "background-color: yellow;";
                                             } 
                                             else if($ans >= 80){
                                                echo "background-color: green;color:white";
                                             }
                                             else if($ans >= 75){
                                                echo "background-color: blue;color:white";
                                             }
                                             else
                                             {
                                                echo "background-color: red;color:white";
                                             }
                                           
                                            
                                             ?>"
                                        >
                                        <td>

                                          <?php echo $selStudentRow['student_fullname']; ?></td>
                                        
                                        <td >
                                        <?php 
                                          if($selAttempt->rowCount() == 0)
                                          {
                                            echo "Нет ответов";
                                          }
                                          else if($selScore->rowCount() > 0)
                                          {
                                            echo $totScore =  $selScore->rowCount();
                                            echo " / ";
                                            echo $over;
                                          }
                                          else
                                          {
                                            echo $totScore =  $selScore->rowCount();
                                            echo " / ";
                                            echo $over;
                                          }

                                            
                                            

                                         ?>
                                        </td>
                                        <td>
                                          <?php 
                                                if($selAttempt->rowCount() == 0)
                                                {
                                                  echo "Нет ответов";
                                                }
                                                else
                                                {
                                                    echo number_format($ans,2); ?>%<?php
                                                }
                                           
                                          ?>
                                        </td>
                                    </tr>
                                <?php }
                             ?>                              
                          </tbody>
                        </table>
                    </div>



                   <?php
                }
                else
                { ?>
                <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div><b>Ранжирование</b></div>
                    </div>
                </div>
                </div> 

                 <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Список экзаменов
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Название</th>
                                <th class="text-left ">Программа</th>
                                <th class="text-left ">Описание</th>
                                <th class="text-center" width="8%">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selExam = $conn->query("SELECT * FROM exams ORDER BY ex_id DESC ");
                                if($selExam->rowCount() > 0)
                                {
                                    while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td class="pl-4"><?php echo $selExamRow['ex_title']; ?></td>
                                            <td>
                                                <?php 
                                                    $courseId =  $selExamRow['cou_id']; 
                                                    $selCourse = $conn->query("SELECT * FROM courses WHERE cou_id='$courseId' ");
                                                    while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) {
                                                        echo $selCourseRow['cou_name'];
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $selExamRow['ex_description']; ?></td>
                                            <td class="text-center">
                                             <a href="?page=ranking-exam&exam_id=<?php echo $selExamRow['ex_id']; ?>"  class="btn btn-success btn-sm">Посмотреть</a>
                                            </td>
                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="5">
                                        <h3 class="p-3">Экзамен не найден</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>   
                    
                <?php }

             ?>      
            
            
      
        
</div>
         


















