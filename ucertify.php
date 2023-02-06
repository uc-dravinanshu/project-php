<?php
  session_start();
  require_once("./smarty/libs/Smarty.class.php");
  $smarty = new Smarty;

  require_once("./function.php");
  $data = file_get_contents('my-question.json');
  //session create.
  $_SESSION['Attempted'] = array();
  $array = json_decode($data, true);

  foreach($array as $row) {
  $_SESSION['Attempted'][$row['content_id']] = "Not Attempted";
   $snippet = $row['snippet'];           
  }
   
  $perPage = 1;
  $total_question = count($array);
  $totalPages = ceil($total_question/$perPage); 
 
 
  $smarty->assign('totalpage',$totalPages);
  $smarty->assign('data',$array);
  $smarty->assign('session',$_SESSION['Attempted']);
  $smarty->display('test.tpl');
?>
<script>
  $(document).ready(function(){
    
  $("#yes-cancel").click(function(){
     window.location.replace("result.php");
  });
  })
    //timer
    var testTime = 30;
    let current_question =  $('#current_question').html();
    let total_question = $('#total_question').html(); 
    let current_id = "";


    function startTimer(duration, display) {
    var timer = duration;
    setInterval(function() {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        display.text(minutes + ":" + seconds);
        if (timer <= 0) {
            $('#countTimer').modal('show');
            window.location.replace("result.php");
        } else {
            timer--;
        }
    }, 1000);
    }
    //set time
    $(function() {
    var minutes = 60 * testTime; // set timer 
      display = $('#countTimer');
      startTimer(minutes, display);    
    });

   $(document).ready(function(){
      $.ajax({
         url: "json_file.php",
         type: "POST",
         data: {
          key: "first_question"
         },
         success: function(data){
          data = JSON.parse(data);
           //console.log(data);
           $('.Question').html(data.Question);
           let format = '';
           $.each(data.Options, function(key, value){
              format += '<div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">';
              format +='<div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">';
              format += '<label class="btn btn-light font-weight-bold" for="'+ value.id +'">'+value.option_number +'</label>';
              format += '<input type="radio" name="ansChecked" id="'+ value.id +'" class="form-check-input options mx-2"/>';
              format += '</div>';
              format += '<label class="form-check-label d-line-block" for="'+ value.id +'"> '+value.answer +' </label>';  
              format += '</div>';  
           });
           $(".Answers").html(format);
            $('.Question').attr('id', data.Content_id);
            current_id = data.Content_id;
            //console.log(data.Content_id);
         }
      });
   })

    
   $(document).ready(function(){

  $('#next').on('click', function(){
      let cont_id = $('.Question').attr('id');
       //console.log(cont_id);
    if(current_question < total_question) {   
      $.ajax({
          url: "json_file.php",
          type: "POST",
          data: {
            key: "next_question",
            content_id: cont_id
          },
          success: function(data){
            current_question++;
            if(current_question == total_question) {
              $("#next").attr('disabled', true);
              $("#next").css('cursor', 'not-allowed');
              $("#next").css('background', 'blur');
            }
            if(current_question > 1){
              $("#previous").attr('disabled', false);
              $("#previous").css('cursor', 'pointer');
            }
            $("#current_question").html(current_question);
            data = JSON.parse(data);
            $('.Question').attr('id',data.Content_id);
            $('.Question').html(data.Question);
            let format = '';
           $.each(data.Options, function(key, value){
            if(data.Attempt == value.id) {
              format += '<div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">';
              format +='<div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">';
              format += '<label class="btn btn-light font-weight-bold" for="'+ value.id +'">'+value.option_number +'</label>';
              format += '<input type="radio" name="ansChecked" id="'+ value.id +'" class="form-check-input options mx-2" checked="ckecked"/>';
              format += '</div>';
              format += '<label class="form-check-label d-line-block" for="'+ value.id +'"> '+value.answer +' </label>';  
              format += '</div>';   
            }else{
              format += '<div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">';
              format +='<div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">';
              format += '<label class="btn btn-light font-weight-bold" for="'+ value.id +'">'+value.option_number +'</label>';
              format += '<input type="radio" name="ansChecked" id="'+ value.id +'" class="form-check-input options mx-2"/>';
              format += '</div>';
              format += '<label class="form-check-label d-line-block" for="'+ value.id +'"> '+value.answer +' </label>';  
              format += '</div>';  
            }
            });
           $(".Answers").html(format);
           current_id = data.Content_id;
            //console.log(data);
          }
      });
    }
 });

   $('#previous').on('click', function(){
      let cont_id = $('.Question').attr('id');
       //console.log(cont_id);
    if(current_question > 1) {   
      $.ajax({
          url: "json_file.php",
          type: "POST",
          data: {
            key: "pre_question",
            content_id: cont_id
          },
          success: function(data){
            current_question--;
            if(current_question == total_question-1) {
              $("#next").attr('disabled', false);
              $("#next").css('cursor', 'pointer');
            }
            if(current_question == 1){
              $("#previous").attr('disabled', true);
              $("#previous").css('cursor', 'not-allowed');
            }
            $("#current_question").html(current_question);
            data = JSON.parse(data);
            console.log(data);
            $('.Question').attr('id',data.Content_id);
            $('.Question').html(data.Question);
            let format = '';
           $.each(data.Options, function(key, value){
            if(data.Attempt == value.id) {
              format += '<div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">';
              format +='<div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">';
              format += '<label class="btn btn-light font-weight-bold" for="'+ value.id +'">'+value.option_number +'</label>';
              format += '<input type="radio" name="ansChecked" id="'+ value.id +'" class="form-check-input options mx-2" checked="ckecked"/>';
              format += '</div>';
              format += '<label class="form-check-label d-line-block" for="'+ value.id +'"> '+value.answer +' </label>';  
              format += '</div>'; 
            }else{
              format += '<div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">';
              format +='<div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">';
              format += '<label class="btn btn-light font-weight-bold" for="'+ value.id +'">'+value.option_number +'</label>';
              format += '<input type="radio" name="ansChecked" id="'+ value.id +'" class="form-check-input options mx-2"/>';
              format += '</div>';
              format += '<label class="form-check-label d-line-block" for="'+ value.id +'"> '+value.answer +' </label>';  
              format += '</div>'; 
            } 
            });
           $(".Answers").html(format);
           current_id = data.Content_id;
            //console.log(data);
          }
      });
    }
   });

   //
   $(".questionList").on('click', function(){
    let id = $(this).attr('id');
    let number = $(this).data('number');
    //console.log(id);
    $.ajax({
         url: "json_file.php",
         type: "POST",
         data:{
          key: "selected_question",
          content_id: id
         },
         success: function(data) {
            //  data = JSON.parse(data);
            console.log(data);
              current_question = number;
             $("#current_question").html(current_question);
              data = JSON.parse(data);
            $('.Question').attr('id',data.Content_id);
            $('.Question').html(data.Question);
            let format = '';
           $.each(data.Options, function(key, value){
            if(data.Attempt == value.id) {
              format += '<div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">';
              format +='<div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">';
              format += '<label class="btn btn-light font-weight-bold" for="'+ value.id +'">'+value.option_number +'</label>';
              format += '<input type="radio" name="ansChecked" id="'+ value.id +'" class="form-check-input options mx-2" checked="ckecked"/>';
              format += '</div>';
              format += '<label class="form-check-label d-line-block" for="'+ value.id +'"> '+value.answer +' </label>';  
              format += '</div>'; 
            }else{
              format += '<div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">';
              format +='<div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">';
              format += '<label class="btn btn-light font-weight-bold" for="'+ value.id +'">'+value.option_number +'</label>';
              format += '<input type="radio" name="ansChecked" id="'+ value.id +'" class="form-check-input options mx-2"/>';
              format += '</div>';
              format += '<label class="form-check-label d-line-block" for="'+ value.id +'"> '+value.answer +' </label>';  
              format += '</div>'; 
            } 
            });
           $(".Answers").html(format);
           current_id = data.Content_id;
            //console.log(data);
         }
      });
   });
   

     $("#allIteams").on("click", function(){
      console.log("clicl all"); 
       $.ajax({
          url: "json_file.php",
          type: "POST",
          data: {
            key: "all"
          },
          success: function(data) {
            data = JSON.parse(data);
            console.log(data);
            let format = '';
            let count= '';
            let counter=1;
            $.each(data, function(key, value){
               format += '<div class="fw-bold">'+counter++;
               format += ': <a class="fw-bold text-decoration-none text-dark questionList" data-bs-dismiss="offcanvas" id="'+ value.Content_id +'">'+value.Question +'</a>';
               format += '<div id="'+value.Content_id+'">';
               if(value.Attempt == true){
                format += '<span class="badge text-bg-primary text-light">Attempted</span>';
               } else{
                format += '<span class="badge text-bg-warning text-light">Unattempted</span>';
               }
               format += '</div>';
            });
            $('#questionContent').html(format);
          }
       });
     });

     $("#attemptedItem").on('click', function(){
          console.log("click Attempted");
          $.ajax({
          url: "json_file.php",
          type: "POST",
          data: {
            key: "attempt"
          },
          success: function(data) {
            data = JSON.parse(data);
            console.log(data);
            let format = '';
            let counter=1;
            $.each(data, function(key, value){
                format += '<div class="fw-bold">'+counter++;
                format += ': <a class="fw-bold text-decoration-none text-dark questionList" data-bs-dismiss="offcanvas" id="'+ value.Content_id +'">'+value.Question +'</a>';
                format += '<div id="'+value.Content_id+'">';
                format += '<span class="badge text-bg-primary text-light">Attempted</span>';
                format += '</div>';
                format += '</div>';
            });
            $('#questionContent').html(format);
          }
       });
     });

     $("#unattemptedItem").on('click', function(){
       console.log("click");
       console.log("click Attempted");
          $.ajax({
          url: "json_file.php",
          type: "POST",
          data: {
            key: "unattempt"
          },
          success: function(data) {
            data = JSON.parse(data);
            console.log(data);
            let format = '';
            let counter=1;
            $.each(data, function(key, value){
                format += '<div class="fw-bold">'+counter++;
                format += ':<a class="fw-bold text-decoration-none text-dark questionList mx-2" data-bs-dismiss="offcanvas" id="'+ value.Content_id +'">'+value.Question +'</a>';
                format += '<div id="'+value.Content_id+'">';
                format += '<span class="badge text-bg-warning text-light">Unattempted</span>';
                format += '</div>'; 
                format += '</div>'; 

            });
            $('#questionContent').html(format);
          }
       });
     })
   });
   //

   $(document).on("change", ".options", function(){
       $('.questionList').children('#'+current_id).html("Attempted").attr('class','badge text-bg-primary d-block w-25 text-light attempted');
       let ansId = $(this).attr('id');
      $.ajax({
           url: "json_file.php",
           type: "POST",
           data: {
            key: "ansChange",
            content_id: current_id,
            ansId: ansId
           },
           success: function(data) {
           }
      });
    });
    
    $("#end-test").on('click', function(){
       $.ajax({
           url: "json_file.php",
           type: "POST",
           data: {
            key: "total_Attempted"
           },
           success: function(data){
             console.log(data);
             $('#attempted-question').html(data);
             $("#remening-question").html(total_question-data);
           }
       });
    });
    
   
  

  
</script>
