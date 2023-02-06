<?php
  require_once('function.php');
   session_start();
if(isset($_POST['key']) && $_POST['key'] == "first_question") {
    echo get_first_question();
}

if(isset($_POST['key']) && $_POST['key'] == "next_question") {
   echo next_question($_POST['content_id']);
}

if(isset($_POST['key']) && $_POST['key'] == "pre_question") {
  echo pre_question($_POST['content_id']);
}

if(isset($_POST['key']) && $_POST['key'] == "selected_question") {
  echo selected_question($_POST['content_id']);
}

if(isset($_POST['key']) && $_POST['key'] == "total_question") {
  echo total_question();
}

if(isset($_POST['key']) && $_POST['key'] == "ansChange") {
  
  $_SESSION['Attempted'][$_POST['content_id']] = $_POST['ansId'];
  echo "success";
}

if(isset($_POST['key']) && $_POST['key'] == "total_Attempted") {
  
 $count = 0;
  foreach($_SESSION['Attempted'] as $row) {
      if($row != "Not Attempted") {
        $count++;
      }
  }
  echo $count;
}

if(isset($_POST['key']) && $_POST['key'] == "question_Attempted") {
  
  foreach($_SESSION['Attempted'] as $row) {
      if($row != "Not Attempted") {
      echo "Attempted";
      }else{
        echo "Not Attempted";
      }
  }

}

if(isset($_POST['key']) && ($_POST['key'] == "all")) {
  echo all();
}

if(isset($_POST['key']) && ($_POST['key'] == "attempt")) {
  echo attempt();
}

if(isset($_POST['key']) && ($_POST['key'] == "unattempt")) {
  echo unattempt();
}
?>