// Admin Log in
$(document).on("submit","#examineeLoginFrm", function(){
   $.post("query/loginExe.php", $(this).serialize(), function(data){
      if(data.res == "invalid")
      {
        Swal.fire(
          'Ошибка',
          'Проверьте эл. почту и пароль на правильность',
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




// Submit Answer
$(document).on('submit', '#submitAnswerFrm', function(){
  var examAction = $('#examAction').val();

  if(examAction != "")
  {
    Swal.fire({
    title: 'Время вышло!',
    text: "Ваше время вышло, нажмите ОК",
    icon: 'warning',
    showCancelButton: false,
    allowOutsideClick: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'OK'
}).then((result) => {
if (result.value) {

   $.post("query/submitAnswerExe.php", $(this).serialize(), function(data){

    if(data.res == "alreadyTaken")
    {
       Swal.fire(
         'Тест уже пройден!',
         "Вы уже проходили тест и не можете пройти его еще раз",
         'error'
       ) 
    }
    else if(data.res == "success")
    {
        Swal.fire({
            title: 'Ваши ответы приняты!',
            text: "Вы можете посмотреть на свой результат в личном кабинете",
            icon: 'success',
            allowOutsideClick: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK!'
        }).then((result) => {
        if (result.value) {
          $('#submitAnswerFrm')[0].reset();
           var exam_id = $('#exam_id').val();
           window.location.href='home.php?page=result&id=' + exam_id;
        }

        });


    }
    else if(data.res == "failed")
    {
     Swal.fire(
         'Ошибка',
         "Что то пошло не так",
         'error'
       ) 
    }

   },'json');

}
});
  }
  else
  {
      Swal.fire({
    title: 'Вы уверены?',
    text: "Вы уверены что хотите закончить тест сейчас?",
    icon: 'warning',
    showCancelButton: true,
    allowOutsideClick: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Да, закончить тест'
}).then((result) => {
if (result.value) {

   $.post("query/submitAnswerExe.php", $(this).serialize(), function(data){

    if(data.res == "alreadyTaken")
    {
       Swal.fire(
         'Вы уже сдавали этот тест',
         "Вы уже проходили этот тест и не можете пройти его еще раз",
         'error'
       ) 
    }
    else if(data.res == "success")
    {
        Swal.fire({
            title: 'Ваши ответы приняты!',
            text: "Вы можете посмотреть на свой результат в личном кабинете",
            icon: 'success',
            allowOutsideClick: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK!'
        }).then((result) => {
        if (result.value) {
          $('#submitAnswerFrm')[0].reset();
           var exam_id = $('#exam_id').val();
           window.location.href='home.php?page=result&id=' + exam_id;
        }

        });


    }
    else if(data.res == "failed")
    {
     Swal.fire(
         'Ошибка',
         "Что то пошло не так",
         'error'
       ) 
    }

   },'json');

}
});
  }








return false;
});


// Submit Feedbacks
$(document).on("submit","#addFeebacks", function(){
   $.post("query/submitFeedbacksExe.php", $(this).serialize(), function(data){
      if(data.res == "limit")
      {
        Swal.fire(
          'Ошибка',
          'Вы превысыли лимит слов',
          'error'
        )
      }
      else if(data.res == "presence")
      {
        Swal.fire(
          'Ошибка',
          'Отзыв не может быть пустым',
          'error'
        )
      }
      else if(data.res == "success")
      {
        Swal.fire(
          'Удачно',
          'Ваш отзыв был успешно отправлен!',
          'success'
        )
          $('#addFeebacks')[0].reset();
        
      }
   },'json');

   return false;
});

