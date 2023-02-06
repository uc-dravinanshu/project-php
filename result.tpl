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
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 mb-3">
              <div class="col-lg-12">
                <div class="col-lg-12 col-md-12 col-12 mb-3">
                  <div class="text-center">
                    <h2 class="mb-3">Result</h2>
                      <div class="btn-group mt-1">
                        <button class="btn btn-outline-light text-dark p-0 px-4 py-2 border border-primary">
                          <span class="bi bi-mortarboard-fill d-block text-success fw-bold fs-5">
                            <span class="mx-1">{$correct}/{$total}</span>
                            </span>
                          <span class="fs-6" tabindex="0" aria-label="All Items">Results</span> 
                        </button>
                      </div>
                      <div class="btn-group mt-1">
                        <button class="btn btn-outline-light text-dark p-0 px-4 py-2 border border-primary">
                          <span class="bi bi-list-ul d-block text-primary fw-bold fs-5">
                            <span class="mx-1" id="total_question">{$total}</span>
                            </span>
                          <span class="fs-6" tabindex="0" aria-label="All Items">Items</span> 
                        </button>
                      </div>
                      <div class="btn-group mt-1">
                        <button class="btn btn-outline-light text-dark p-0 px-4 py-2 border border-primary">
                          <span class="bi bi-check-lg d-block text-success fw-bold fs-5">
                            <span class="mx-1" id="correct">{$correct}</span>
                            </span>
                          <span class="fs-6" tabindex="0" aria-label="All Items">Correct</span> 
                        </button>
                      </div>
                      <div class="btn-group mt-1">
                        <button class="btn btn-outline-light text-dark p-0 px-4 py-2 border border-primary">
                          <span class="bi bi-x-lg d-block text-danger fw-bold fs-5">
                            <span class="mx-1" id="incorrect"></span>
                            </span>
                          <span class="fs-6" tabindex="0" aria-label="All Items">Incorrect</span> 
                        </button>
                      </div>
                      <div class="btn-group mt-1">
                        <button class="btn btn-outline-light text-dark p-0 px-4 py-2 border border-primary">
                          <span class="bi bi-eye d-block text-info fw-bold fs-5">
                            <span class="mx-1" id="attempt"></span>
                            </span>
                          <span class="fs-6" tabindex="0" aria-label="All Items">Attempted</span> 
                        </button>
                      </div>
                      <div class="btn-group mt-1">
                        <button class="btn btn-outline-light text-dark p-0 px-4 py-2 border border-primary">
                          <span class="bi bi-eye-slash d-block text-warning fw-bold fs-5">
                            <span class="mx-1" id="unattempt"></span>
                            </span>
                          <span class="fs-6" tabindex="0" aria-label="All Items">Unattempted</span> 
                        </button>
                      </div>
                  </div>
              </div>
              </div>
            </div>   
        </div>
    </div> 
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 ">
                <div class="table-responsive">
                    <table class="table table-hover border text-center text-wrap align-middle">
                        <thead class="table-success">
                          <tr>
                            <th scope="col" width="7%" class="fs-5">Index</th>
                            <th scope="col" width="70%" class="fs-5">Question</th>
                            <th scope="col" width="16%" class="fs-5">Options</th>
                            <th scope="col" width="7%" class="fs-5">Results</th>
                          </tr>
                        </thead>
                        <tbody>
                           {foreach $data as $row}
                              {assign var="options" value=json_decode(selected_question($row['content_id']), true)}
                              {assign var="options" value=$options.Options}
                              {assign var="number" value=json_decode(selected_question($row['content_id']), true)}
                              {assign var="number" value=$number.Number}
                              <tr class="justify-content-center">
                                <th>  
                                   {$number}
                                </th>
                                <th>
                                  <a href="review.php?content_id={$row['content_id']}" id="{$row['content_id']}" class="text-decoration-none  questionResult" style="font-size: 17px;">{$row['snippet']}</a>
                                </th>  
                                <th>
                                  {foreach $options as $opt}
                                    {if $session[$row['content_id']] == "Not Attempted"}
                                      {if $opt.is_correct eq 1}
                                       <div class="d-inline-block p-0 py-2">
                                        <span class="alert alert-success rounded-circle px-2 py-1">{$opt.option_number}</span>
                                       </div>
                                       {else}
                                        <div class="d-inline-block p-0 py-2">
                                          <span class="alert alert-secondary rounded-circle px-2 py-1">{$opt.option_number}</span>
                                        </div>
                                       {/if} 
                                    {elseif $session[$row['content_id']] == $opt.id}
                                      {if $opt.is_correct eq 1}
                                      <div class="d-inline-block p-0 py-2">
                                        <span class="alert alert-success rounded-circle px-2 py-1">{$opt.option_number}</span>
                                      </div>
                                      {else}
                                      <div class="d-inline-block p-0 py-2">
                                        <span class="alert alert-danger rounded-circle px-2 py-1">{$opt.option_number}</span>
                                      </div>
                                      {/if}
                                     {elseif $opt.is_correct eq 1}
                                     <div class="d-inline-block p-0 py-2">
                                       <span class="alert alert-success rounded-circle px-2 py-1">{$opt.option_number}</span>
                                     </div>
                                     {else}
                                     <div class="d-inline-block p-0 py-2">
                                      <span class="alert alert-secondary rounded-circle px-2 py-1">{$opt.option_number}</span>
                                     </div>
                                    {/if}
                                  {/foreach}
                                </th>
                                <th>
                                  {foreach $options as $opt}
                                  {if $session[$row['content_id']] == "Not Attempted"}
                                    {if $opt.is_correct eq 1} 
                                      <div class="bi bi-eye-slash-fill fs-5 text-warning" id="{$row['content_id']}"></div>
                                     {/if} 
                                  {elseif $session[$row['content_id']] == $opt.id}
                                    {if $opt.is_correct eq 1}
                                      <div class="bi bi-check-lg fs-5 text-success" id="{$row['content_id']}"></div>
                                    {else}
                                      <div class="bi bi-x-lg fs-5 text-danger" id="{$row['content_id']}"></div>
                                    {/if}
                                  {/if}
                                {/foreach}
                                </th>
                              </tr>
                           {/foreach}
                        </tbody>
                      </table>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12">
              <div class="mb-3 float-lg-end">
                <button id="dashboardId" class="btn btn-primary" tabindex="0">
                  <i class="bi bi-text-indent-right"></i> <span class="mx-1">Go To Dashboard</span>
                </button>
              </div>
            </div>
        </div>
    </div>
 {include file='./inc/script.tpl'}
</body>
</html>