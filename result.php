<?php
/*
 * File-name : Project-PHP/result.php
 * Created at : 06/02/2023
 * @detail : this is a result.php file responsibel for showing the resuts when you end the test.
 * Last Updated by : Dravinanshu Mishra <dravinanshu.mishra@ucertify.com>
 * last Updated Date : 06/02/2023
 */
session_start();
if(!isset($_SESSION['Attempted'])){
    header("location: index.php");
}
require_once("./function.php");
require_once("./smarty/libs/Smarty.class.php");
$smarty = new Smarty();

$file = file_get_contents("my-question.json");
$array = json_decode($file, true);

$count = count($array);
$smarty->assign("data", $array);
$smarty->assign("total", total_question());
$smarty->assign("correct", correct_question());
$smarty->assign('session', $_SESSION['Attempted']);
$smarty->display("result.tpl");
?>
<script>
     let total_question = $('#total_question').html(); 
     let correct = $("#correct").html();
    $(document).ready(function(){
        $("#dashboardId").on('click', function(){
            //console.log("hello");
            window.location.replace("logout.php");
        });
    });

    $(document).ready(function(){
        $.ajax({
            url: "json_file.php",
            type: "POST",
            data: {
            key: "total_Attempted"
            },
            success: function(data){
            //console.log(data);
            $("#attempt").html(data);
            $("#incorrect").html(data-correct);
            $("#unattempt").html(total_question-data);
            }
        });
    });
</script>

