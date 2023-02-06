<?php
   session_start();
   if(!isset($_SESSION['Attempted']) || !isset($_GET['content_id'])){
      header("location: index.php");
   }
   require_once("./smarty/libs/Smarty.class.php");
   require_once("./function.php");
   $smarty = new Smarty;

   $id = $_GET['content_id'];

   $file = file_get_contents("my-question.json");
   $array = json_decode($file, true);


   $smarty->assign("data", $array);
   $smarty->assign("total", total_question());
   $smarty->assign("session", $_SESSION['Attempted']);
   $smarty->assign("question", selected_question($id));
   $smarty->display('review.tpl');
?>
<script>
   let current_question = $("#current_question").html();
   //console.log(typeof(current_question));
   let current_id = $('.Question').attr('id');
   //console.log(typeof(current_id));
    let total_question = $("#total_question").html();
    //console.log(total_question);
    let id = '<?php echo $id; ?>';
    //console.log(id);
   

    $(document).ready(function(){
      $.ajax({
         url: "json_file.php",
         type: "POST",
         data: {
            key: "selected_question",
            content_id: current_id
         },
         success: function(data){
            data = JSON.parse(data);
           console.log(data);
            $('.Question').html(data.Question);
            //console.log(data.Question);
            //console.log(data.Options);
            //console.log(data.Number);
             let format = '';
             $.each(data.Options, function(key, value){
               if(value.is_correct ==1){  
                  format += '<div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">';
                  format +='<div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">';
                  format += '<label class="btn btn-success fw-bold" for="'+ value.id +'">'+value.option_number +'</label>';
                  format += '<input type="radio" disabled="disabled" name="ansChecked" id="'+ value.id +'" class="form-check-input options mx-2 bg-success" checked="ckecked"/>';
                  format += '</div>';
                  format += '<label class="form-check-label d-line-block" for="'+ value.id +'"> '+value.answer +' </label>';  
                  format += '</div>';
               } else{
                  format += '<div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">';
                  format +='<div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">';
                  format += '<label class="btn btn-light fw-bold" for="'+ value.id +'">'+value.option_number +'</label>';
                  format += '<input type="radio" disabled="disabled" name="ansChecked" id="'+ value.id +'" class="form-check-input options mx-2"/>';
                  format += '</div>';
                  format += '<label class="form-check-label d-line-block" for="'+ value.id +'"> '+value.answer +' </label>';  
                  format += '</div>';
               }
             });
            //$('.Answers').html(format);
            $('#current_question').html(data.Number);
            $("#Explain").html(data.Explanation);
         }
      });
    });

    $(document).ready(function(){
       $("#next").on('click', function(){
         if(parseInt(current_question) < parseInt(total_question)) {
            console.log("cl");
            $.ajax({
                url: "json_file.php",
                type: "POST",
                data: {
                    key: "next_question",
                    content_id: current_id
                },
                success: function(data){
                    current_question++;
                    data = JSON.parse(data);
                        current_id = data.Content_id;
                       // console.log(current_id);
                     //window.location.href
                     window.location.href = window.location.href.split("=")[0]+"="+data.Content_id;
                    //console.log(data);
                    //console.log(data.Content_id);
                    //console.log(data.Question);
                   //console.log(data.Number);
                    $('.Question').html(data.Question);
                    let format = '';
                    $.each(data.Options, function(key, value){
                     if(value.is_correct ==1){  
                        format += '<div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">';
                        format +='<div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">';
                        format += '<label class="btn btn-success fw-bold" for="'+ value.id +'">'+value.option_number +'</label>';
                        format += '<input type="radio" disabled="disabled" name="ansChecked" id="'+ value.id +'" class="form-check-input options mx-2 bg-success" checked="ckecked"/>';
                        format += '</div>';
                        format += '<label class="form-check-label d-line-block" for="'+ value.id +'"> '+value.answer +' </label>';  
                        format += '</div>';
                     } else{
                        format += '<div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">';
                        format +='<div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">';
                        format += '<label class="btn btn-light fw-bold" for="'+ value.id +'">'+value.option_number +'</label>';
                        format += '<input type="radio" disabled="disabled" name="ansChecked" id="'+ value.id +'" class="form-check-input options mx-2"/>';
                        format += '</div>';
                        format += '<label class="form-check-label d-line-block" for="'+ value.id +'"> '+value.answer +' </label>';  
                        format += '</div>';
                     }
                    });
                  // $('.Answers').html(format);
                   $('#current_question').html(data.Number);  
                   $("#Explain").html(data.Explanation); 
                    
                }
            });
           }
       });

       $('#previous').on('click', function(){
         if(parseInt(current_question) > 1 ) {
            console.log("cl");
            $.ajax({
                url: "json_file.php",
                type: "POST",
                data: {
                    key: "pre_question",
                    content_id: current_id
                },
                success: function(data){
                    current_question--;
                    data = JSON.parse(data);
                        current_id = data.Content_id;
                       //console.log(current_id);
                     //window.location.href
                     window.location.href = window.location.href.split("=")[0]+"="+data.Content_id;
                     //console.log(data);
                     //console.log(data.Content_id);
                     //console.log(data.Question);
                     //console.log(data.Number);
                    $('.Question').html(data.Question);
                    let format = '';
                    $.each(data.Options, function(key, value){
                     if(value.is_correct ==1){  
                        format += '<div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">';
                        format +='<div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">';
                        format += '<label class="btn btn-success fw-bold" for="'+ value.id +'">'+value.option_number +'</label>';
                        format += '<input type="radio" disabled="disabled" name="ansChecked" id="'+ value.id +'" class="form-check-input options mx-2 bg-success" checked="ckecked"/>';
                        format += '</div>';
                        format += '<label class="form-check-label d-line-block" for="'+ value.id +'"> '+value.answer +' </label>';  
                        format += '</div>';
                     } else{
                        format += '<div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">';
                        format +='<div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">';
                        format += '<label class="btn btn-light fw-bold" for="'+ value.id +'">'+value.option_number +'</label>';
                        format += '<input type="radio" disabled="disabled" name="ansChecked" id="'+ value.id +'" class="form-check-input options mx-2"/>';
                        format += '</div>';
                        format += '<label class="form-check-label d-line-block" for="'+ value.id +'"> '+value.answer +' </label>';  
                        format += '</div>';
                     }
                    });
                  // $('.Answers').html(format);
                   $('#current_question').html(data.Number);  
                   $("#Explain").html(data.Explanation);     
                }
            });
           }
       });
    });
</script>