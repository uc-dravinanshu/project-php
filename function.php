<?php
/*
 * File-name : Project-PHP/function.php
 * Created at : 06/02/2023
 * @detail : this is a function.php file responsibel for all functions which is directaly taking date with my-question.json file.
 * Last Updated by : Dravinanshu Mishra <dravinanshu.mishra@ucertify.com>
 * last Updated Date : 06/02/2023
 */
 //session_start();
//get first question function.
function get_first_question() {
    $file = file_get_contents("my-question.json");
    $array = json_decode($file, true);
    $answer_id =  $_SESSION['Attempted'][$array[0]['content_id']];
    $temp = $array[0]['content_text'];
      $temp = json_decode($temp);
      $option_temp = json_decode(json_encode($temp), true)['answers'];
      $num = 'A';
      $options = [];
      foreach($option_temp as $option){
          $option["option_number"] =  $num;
          $option['id'] = $option['id'];
          $option['is_correct'] = $option['is_correct'];
          $options[] = $option;
          $num++;
      }
    $response = array(
        "Content_id"=> $array[0]['content_id'],
        "Question"=> json_decode($array[0]['content_text'],true)['question'],
        "Options"=> $options,
        "Attempt"=> $answer_id 
    );
    return json_encode($response);
}

   //get next question function.
   function next_question($current_id) {
      $file = file_get_contents("my-question.json");
      $array = json_decode($file, true);
    $flag = false;
    $count = 0;
    foreach($array as $row) {
      $count++;
      if($flag == true) {
        $answer_id =  $_SESSION['Attempted'][$row['content_id']];
        $temp = $row['content_text'];
            $temp = json_decode($temp);
            $option_temp = json_decode(json_encode($temp), true)['answers'];
            $num = 'A';
            $options = [];
            foreach($option_temp as $option){
                $option["option_number"] =  $num;
                $option['id'] = $option['id'];
                $option['is_correct'] = $option['is_correct'];
                $options[] = $option;
                $num++;
            }
        $response = array(
          "Content_id"=> $row['content_id'],
          "Question"=> json_decode($row['content_text'],true)['question'],
          "Options"=> $options,
          "Explanation"=> json_decode($row['content_text'], true)['explanation'],
          "Attempt"=> $answer_id,
          "Number"=> $count++
      );
     return json_encode($response); 
      }
       if($row['content_id'] == $current_id) {
          $flag = true;
          continue;
       }
       
    } 
   }
   

 //get previous function.
 function pre_question($current_id) { 
  $file = file_get_contents("my-question.json");
  $array = json_decode($file, true);
  
  $pre_id = '';
  foreach($array as $row) {
      if($current_id == $row['content_id']) {
        break;
      }
      $pre_id = $row['content_id'];
  }
  foreach($array as $row) {
    if($pre_id == $row['content_id']) {
        $answer_id = $_SESSION['Attempted'][$row['content_id']];
        $temp = $row['content_text'];
            $temp = json_decode($temp);
            $option_temp = json_decode(json_encode($temp), true)['answers'];
            $num = 'A';
            $options = [];
            foreach($option_temp as $option){
                $option["option_number"] =  $num;
                $option['id'] = $option['id'];
                $option['is_correct'] = $option['is_correct'];
                $options[] = $option;
                $num++;
            }
      $response = array(
        "Content_id"=> $row['content_id'],
        "Question"=> json_decode($row['content_text'],true)['question'],
        "Options"=> $options,
        "Explanation"=> json_decode($row['content_text'], true)['explanation'],
        "Attempt"=> $answer_id 
    );
    return json_encode($response); 
    }
  } 
 }

 //get selected question.
 function selected_question($current_id) {
  
   $file = file_get_contents("my-question.json");
   $array = json_decode($file, true);
     $count = 0;
    foreach($array as $row) {
      $count++;
      if($current_id == $row['content_id']) {
        $answer_id = $_SESSION['Attempted'][$row['content_id']];
        $temp = $row['content_text'];
            $temp = json_decode($temp);
            $option_temp = json_decode(json_encode($temp), true)['answers'];
            $num = 'A';
            $options = [];
            foreach($option_temp as $option){
                $option["option_number"] =  $num;
                $option['id'] = $option['id'];
                $option['is_correct'] = $option['is_correct'];
                $options[] = $option;
                $num++;
            }
        $response = array(
          "Content_id"=> $row['content_id'],
          "Question"=> json_decode($row['content_text'],true)['question'],
          "Options"=> $options,
          "Explanation"=> json_decode($row['content_text'], true)['explanation'],
          "Attempt"=> $answer_id,
          "Number"=>$count++
        );
       return json_encode($response); 
      }
    }
  }
  
  //total_questions.
  function total_question() {
    $file = file_get_contents("my-question.json");
    $array = json_decode($file, true); 
    $count = 0;
    foreach($array as $row) {
        $count++;
    }
    return $count;
  }

  //
  function correct_question() { 
     $file = file_get_contents("my-question.json");
     $array = json_decode($file, true);
     
     $correct = 0;
     foreach($array as $row) {
          $question = json_decode($row['content_text'], true)['question'];
          $answers = json_decode($row['content_text'], true)['answers'];
          foreach($answers as $option) {
            //check match. session.
            if($_SESSION['Attempted'][$row['content_id']] == $option['id'] && $option['is_correct'] == 1){
              $correct++;
            }
          }
     }
     return $correct;
  }

  function all() {
    $file = file_get_contents("my-question.json");
    $array = json_decode($file, true);
    $response = [];
    foreach($array as $row) {
      $attempt = false;
      if($_SESSION['Attempted'][$row['content_id']] == "Not Attempted"){
        $response[] = array(
          "Content_id"=> $row['content_id'],
          "Question"=> $row['snippet'],
          "Attempt"=> $attempt
        );
      }
      else {
        $attempt = true;
        $response[] = array(
          "Content_id"=> $row['content_id'],
          "Question"=> $row['snippet'],
          "Attempt"=> $attempt
        );
      }
    }
    return json_encode($response); 
  }

  
  function attempt() {
    $file = file_get_contents("my-question.json");
    $array = json_decode($file, true);
    $response = [];
    foreach($array as $row) {
      if($_SESSION['Attempted'][$row['content_id']] != "Not Attempted"){
        $response[] = array(
          "Content_id"=> $row['content_id'],
          "Question"=> $row['snippet']
        );
      }
    }
    return json_encode($response); 
  }

   function unattempt() {
    $file = file_get_contents("my-question.json");
    $array = json_decode($file, true);
    $response = [];
    foreach($array as $row) {
      if($_SESSION['Attempted'][$row['content_id']] == "Not Attempted"){
        $response[] = array(
          "Content_id"=> $row['content_id'],
          "Question"=> $row['snippet']
        );
      }
    }
    return json_encode($response); 
  }

  ?>