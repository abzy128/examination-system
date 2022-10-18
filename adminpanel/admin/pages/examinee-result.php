<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>EXAMINEE RESULT</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Examinee Result
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Exam Name</th>
                                <th>Scores</th>
                                <th>Ratings</th>
                                <!-- <th width="10%"></th> -->
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selStudent = $conn->query("SELECT * FROM students et INNER JOIN exam_attempts ea ON et.student_id = ea.student_id ORDER BY ea.examat_id DESC ");
                                if($selStudent->rowCount() > 0)
                                {
                                    while ($selStudentRow = $selStudent->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                           <td><?php echo $selStudentRow['student_fullname']; ?></td>
                                           <td>
                                             <?php 
                                                $eid = $selStudentRow['student_id'];
                                                $selExName = $conn->query("SELECT * FROM exams et INNER JOIN exam_attempts ea ON et.ex_id=ea.exam_id WHERE  ea.student_id='$eid' ")->fetch(PDO::FETCH_ASSOC);
                                                $exam_id = $selExName['ex_id'];
                                                echo $selExName['ex_title'];
                                              ?>
                                           </td>
                                           <td>
                                                    <?php 
                                                    $selScore = $conn->query("SELECT * FROM exam_questions eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$eid' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ");
                                                      ?>
                                                <span>
                                                    <?php echo $selScore->rowCount(); ?>
                                                    <?php 
                                                        $over  = $selExName['ex_questlimit_display'];
                                                     ?>
                                                </span> / <?php echo $over; ?>
                                           </td>
                                           <td>
                                              <?php 
                                                    $selScore = $conn->query("SELECT * FROM exam_questions eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$eid' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ");
                                                ?>
                                                <span>
                                                    <?php 
                                                        $score = $selScore->rowCount();
                                                        $ans = $score / $over * 100;
                                                        echo number_format($ans,2);
                                                        // echo "$ans";
                                                        echo "%";
                                                        
                                                     ?>
                                                </span> 
                                           </td>
                                           <!-- <td>
                                               <a rel="facebox" href="facebox_modal/updateExaminee.php?id=<?php echo $selStudentRow['student_id']; ?>" class="btn btn-sm btn-primary">Print Result</a>

                                           </td> -->
                                        </tr>
                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">Результаты не найдены</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>
         
