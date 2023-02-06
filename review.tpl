<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {include file='./inc/links.tpl'}
    <title>Ucertify Online Test</title>
</head>
<body>
{include file='./inc/header.tpl'} 
 {assign var="question" value=json_decode($question, true)}   
  <div class="container mt-5">
     <div class="row">
        <div class="col-lg-2 col-md-2 offset-4 col-4 mb-3">
            {foreach $question.Options as $option}
                {if $question.Attempt == "Not Attempted" and $option.is_correct}
                    {assign var="correct_option" value=$option.option_number}
                    <div class="alert alert-secondary p-0 py-2 px-2" role="alert">
                        <i class="bi bi-eye-slash fs-5 ms-4"></i>
                        <span class="mx-2 fw-bold">Unattemped</span>
                      </div>
                {else}
                    {if $question.Attempt eq $option.id}
                        {if $option.is_correct}
                            {assign var="correct_option" value=$option.option_number}
                            <div class="alert alert-success p-0 py-2 px-2" role="alert">
                                <i class="bi bi-check-lg fs-5 ms-4"></i>
                                <span class="mx-2 fw-bold">Correct</span>
                            </div>
                        {else}
                        <div class="alert alert-danger p-0 py-2 px-2" role="alert">
                            <i class="bi bi-x-lg fs-5 ms-4"></i>
                            <span class="mx-2 fw-bold">Wrong</span>
                        </div>
                        {/if}
                    {/if}
                {/if}
        {/foreach} 
        </div>                      
        </div>
        <div class="col-lg-12 col-md-12 col-12 mb-3">
            <div class="fs-4 mb-5 bg-light shadow p-4">Question:
               <span class="Question fs-5" id="{$question.Content_id}"></span>
            </div>
            {foreach $question.Options as $option}
                {if $question.Attempt == "Not Attempted" and $option.is_correct}
                    {assign var="correct_option" value=$option.option_number}
                    <div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">
                        <div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">
                            <label class="btn btn-success fw-bold" for="{$option.id}">{$option.option_number}</label>
                            <input type="radio" disabled="disabled" name="ansChecked"  class="form-check-input options mx-2 bg-success" id="{$option.id}">
                        </div>
                        <label class="form-check-label d-line-block" for="{$option.id}">{$option.answer}</label><br>
                    </div>
                {else}
                    {if $question.Attempt eq $option.id}
                        {if $option.is_correct}
                            {assign var="correct_option" value=$option.option_number}
                            <div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">
                                <div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">
                                    <label class="btn btn-success fw-bold" for="{$option.id}">{$option.option_number}</label>
                                    <input type="radio" disabled="disabled" name="ansChecked" class="form-check-input options mx-2 bg-success" id="{$option.id}"/>
                                </div>
                                <label class="form-check-label d-line-block" for="{$option.id}">{$option.answer}</label><br>
                            </div>
                        {else}
                            <div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-2 py-1"> 
                                    <i class="bi bi-x-lg text-danger fw-bold"></i>
                                <div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">
                                    <label class="btn btn-danger fw-bold" for="{$option.id}">{$option.option_number}</label>
                                    <input type="radio" disabled="disabled" name="ansChecked" class="form-check-input options mx-2 bg-danger" id="{$option.id}">
                                </div>
                                <label class="form-check-label d-line-block" for="{$option.id}">{$option.answer}</label><br>
                            </div>
                        {/if}
                    {else}
                        {if $option.is_correct}
                            {assign var="correct_option" value=$option.option_number}
                            <div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">
                                <div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">
                                    <label class="btn btn-success fw-bold" for="{$option.id}">{$option.option_number}</label>
                                    <input type="radio" disabled="disabled" name="ansChecked" class="form-check-input options mx-2 bg-success" id="{$option.id}"/>
                                </div>
                                <label class="form-check-label d-line-block" for="{$option.id}">{$option.answer}</label><br>
                            </div>
                        {else}
                        <div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">
                            <div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">
                                <label class="btn btn-light fw-bold" for="{$option.id}">{$option.option_number}</label>
                                <input type="radio" disabled="disabled" name="ansChecked" class="form-check-input options mx-2" id="{$option.id}">
                            </div>
                            <label class="form-check-label d-line-block" for="{$option.id}">{$option.answer}</label><br>
                        </div>
                        {/if}
                    {/if}
                {/if}
        {/foreach}         
        </div>
        <div class="col-lg-12 col-md-12 col-12">
            <div class="bg-light shadow p-4">
                <div class="fs-5 fw-bold">Explanation:</div>
                <div id="Explain" class="fs-6"></div>
            </div>
        </div>
        <div class="col-lg-12 bg-white p-5"></div>
     </div>
  </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 position-fixed bottom-0">
                <ul class="pagination justify-content-center align-items-center bg-light border-top border-2 pt-2">
                    <a href="index.php" id="dashboard" class="page-link  shadow-none mx-3 fw-bold text-dark next">Dashboard</a>
                    <button class="page-link shadow-none mx-3 fw-bold text-dark previous" id="previous" type="button">Previous</button>
                    <h6><span id="current_question">{$question.Number}</span> of <span id="total_question">{$total}</span></h6>
                    <button class="page-link shadow-none mx-3 fw-bold text-dark next" id="next" type="button" value="submit">Next</button>
                    <a href="result.php" id="result" class="page-link  shadow-none mx-3 fw-bold text-dark next">Result</a>
                </ul>
            </div>
        </div>  
    </div>
 {include file='./inc/script.tpl'}
</body>
</html>