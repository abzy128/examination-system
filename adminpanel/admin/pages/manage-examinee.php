<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>Управление учеников</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Список учеников
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th>Полное имя</th>
                                <th>Пол</th>
                                <th>День рождения</th>
                                <th>Учебная программа</th>
                                <th>Класс</th>
                                <th>Эл. почта</th>
                                <th>Пароль</th>
                                <th>Статус</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selStudent = $conn->query("SELECT * FROM students ORDER BY student_id DESC ");
                                if($selStudent->rowCount() > 0)
                                {
                                    while ($selStudentRow = $selStudent->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                           <td><?php echo $selStudentRow['student_fullname']; ?></td>
                                           <td><?php echo $selStudentRow['student_gender']; ?></td>
                                           <td><?php echo $selStudentRow['student_birthdate']; ?></td>
                                           <td>
                                            <?php 
                                                 $studentCourse = $selStudentRow['student_course'];
                                                 $selCourse = $conn->query("SELECT * FROM courses WHERE cou_id='$studentCourse' ")->fetch(PDO::FETCH_ASSOC);
                                                 echo $selCourse['cou_name'];
                                             ?>
                                            </td>
                                           <td><?php echo $selStudentRow['student_year_level']; ?></td>
                                           <td><?php echo $selStudentRow['student_email']; ?></td>
                                           <td><?php echo $selStudentRow['student_password']; ?></td>
                                           <td><?php echo $selStudentRow['student_status']; ?></td>
                                           <td>
                                               <a rel="facebox" href="facebox_modal/updateExaminee.php?id=<?php echo $selStudentRow['student_id']; ?>" class="btn btn-sm btn-primary">Изменить</a>

                                           </td>
                                        </tr>
                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">Ученики не найдены</h3>
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
         
