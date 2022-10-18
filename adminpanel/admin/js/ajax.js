// Admin Log in
$(document).on("submit","#adminLoginFrm", function(){
   $.post("query/loginExe.php", $(this).serialize(), function(data){
      if(data.res == "invalid")
      {
        Swal.fire(
          'Ошибка',
          'Проверьте правильность введённых данных',
          'error'
        )
      }
      else if(data.res == "success")
      {
        $('body').fadeOut();
        window.location.href='home.php';
      }
   },'json');

   return false;
});



// Add Course 
$(document).on("submit","#addCourseFrm" , function(){
  $.post("query/addCourseExe.php", $(this).serialize() , function(data){
  	if(data.res == "exist")
  	{
  		Swal.fire(
  			'Ошибка',
  			data.course_name.toUpperCase() + ' Уже существует',
  			'error'
  		)
  	}
  	else if(data.res == "success")
  	{
  		Swal.fire(
  			'Удач1но',
  			data.course_name.toUpperCase() + ' был добавлен',
  			'success'
  		)
          // $('#course_name').val("");
          refreshDiv();
            setTimeout(function(){ 
                $('#body').load(document.URL);
             }, 2000);
  	}
  },'json')
  return false;
});

// Update Course
$(document).on("submit","#updateCourseFrm" , function(){
  $.post("query/updateCourseExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Удачно',
            'Выбранная программа была успешно обновлена!',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});


// Delete Course
$(document).on("click", "#deleteCourse", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteCourseExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Удачно',
            'Выбранная программа была удалена',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });


// Delete Exam
$(document).on("click", "#deleteExam", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteExamExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Удачно',
            'Выбранная программа была удалена',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });



// Add Exam 
$(document).on("submit","#addExamFrm" , function(){
  $.post("query/addExamExe.php", $(this).serialize() , function(data){
    if(data.res == "noSelectedCourse")
   {
      Swal.fire(
          'Не выбран курс',
          'Выберите курс',
          'error'
       )
    }
    if(data.res == "noSelectedTime")
   {
      Swal.fire(
          'Ошибка',
          'Выберите лимит времени',
          'error'
       )
    }
    if(data.res == "noDisplayLimit")
   {
      Swal.fire(
          'Ошибка',
          'Добавьте лимит времени на вопрос',
          'error'
       )
    }

     else if(data.res == "exist")
    {
      Swal.fire(
        'Ошибка',
        data.examTitle.toUpperCase() + '<br> уже существует',
        'error'
      )
    }
    else if(data.res == "success")
    {
      Swal.fire(
        'Удачно',
        data.examTitle.toUpperCase() + '<br> успешно добавлен',
        'success'
      )
          $('#addExamFrm')[0].reset();
          $('#course_name').val("");
          refreshDiv();
    }
  },'json')
  return false;
});



// Update Exam 
$(document).on("submit","#updateExamFrm" , function(){
  $.post("query/updateExamExe.php", $(this).serialize() , function(data){
    if(data.res == "success")
    {
      Swal.fire(
          'Успешно',
          data.msg + ' <br> теперь изменён',
          'success'
       )
          refreshDiv();
    }
    else if(data.res == "failed")
    {
      Swal.fire(
        "Ошибка",
         'Что то пошло не так',
        'error'
      )
    }
   
  },'json')
  return false;
});

// Update Question
$(document).on("submit","#updateQuestionFrm" , function(){
  $.post("query/updateQuestionExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Удачно',
            'Выбранный вопрос был обновлён!',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});


// Delete Question
$(document).on("click", "#deleteQuestion", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteQuestionExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Удачно',
            'Выбранный вопрос был удален',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });


// Add Question 
$(document).on("submit","#addQuestionFrm" , function(){
  $.post("query/addQuestionExe.php", $(this).serialize() , function(data){
    if(data.res == "exist")
    {
      Swal.fire(
          'Ошибка',
          'Вопрос <br>' + data.msg + '<br> уже существует',
          'error'
       )
    }
    else if(data.res == "success")
    {
      Swal.fire(
        'Удачно',
         'Вопрос <br>' + data.msg + '<br> был добавлен',
        'success'
      )
        $('#addQuestionFrm')[0].reset();
        refreshDiv();
    }
   
  },'json')
  return false;
});


// Add Student
$(document).on("submit","#addExamineeFrm" , function(){
  $.post("query/addExamineeExe.php", $(this).serialize() , function(data){
    if(data.res == "noGender")
    {
      Swal.fire(
          'Ошибка',
          'Выберите пол',
          'error'
       )
    }
    else if(data.res == "noCourse")
    {
      Swal.fire(
          'Ошибка',
          'Выберите программу',
          'error'
       )
    }
    else if(data.res == "noLevel")
    {
      Swal.fire(
          'Ошибка',
          'Выберите класс',
          'error'
       )
    }
    else if(data.res == "fullnameExist")
    {
      Swal.fire(
          'Ошибка',
          data.msg + ' уже существует',
          'error'
       )
    }
    else if(data.res == "emailExist")
    {
      Swal.fire(
          'Ошибка',
          data.msg + ' уже существует',
          'error'
       )
    }
    else if(data.res == "success")
    {
      Swal.fire(
          'Удачно',
          data.msg + ' был добавлен',
          'success'
       )
        refreshDiv();
        $('#addExamineeFrm')[0].reset();
    }
    else if(data.res == "failed")
    {
      Swal.fire(
          "Ошибка",
          'Что то пошло не так',
          'error'
       )
    }


    
  },'json')
  return false;
});



// Update Examinee
$(document).on("submit","#updateExamineeFrm" , function(){
  $.post("query/updateExamineeExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Удачно',
            data.exFullname + ' <br> был изменён!',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});


function refreshDiv()
{
  $('#tableList').load(document.URL +  ' #tableList');
  $('#refreshData').load(document.URL +  ' #refreshData');

}


