<?php
/* Smarty version 4.3.0, created on 2023-02-06 12:58:18
  from 'C:\xampp\htdocs\MaaSharda\test.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63e0eb5abc5107_19455274',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3dfd679fb55b814b7bbdb44d435efe5187d3abb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MaaSharda\\test.tpl',
      1 => 1675684695,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./inc/links.tpl' => 1,
    'file:./inc/header.tpl' => 1,
    'file:./inc/script.tpl' => 1,
  ),
),false)) {
function content_63e0eb5abc5107_19455274 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\MaaSharda\\smarty\\libs\\plugins\\function.counter.php','function'=>'smarty_function_counter',),));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $_smarty_tpl->_subTemplateRender('file:./inc/links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <title>Ucertify Online Test</title>
</head>
<body>
<?php $_smarty_tpl->_subTemplateRender('file:./inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 p-2">
          <div class="Question fs-5 p-2 mb-5 bg-light shadow p-4 rounded-2" tabindex="0" aria-label="Question"></div>
          <div class="Answers" id="Answers"></div>
        </div>
    </div>
</div>
<!-------------Modal for list-------------->
<div class="offcanvas offcanvas-start" tabindex="-1"  data-bs-scroll="true" data-bs-backdrop="false" id="allItem" aria-labelledby="AllQuestions">
    <div class="offcanvas-header border-2 border-bottom">
      <h5 class="offcanvas-title" id="title-AllQuestion">
         <div class="d-flex justify-content-center align-items-center">
            <i class="bi bi-list-ul fs-2 text-primary fw-bold"></i> 
            <span class="mx-2">Items</span>
         </div>
      </h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex justify-content-between">
        <div class="d-flex flex-column px-3 pt-2 min-vh-100 max-vh-100">
          <ol class="nav nav-pills flex-column align-items-center orderlist" id="listItem">
              <li>
                <div class="btn-group mb-3" role="group" aria-label="Basic radio toggle button group"> 
                  <input type="radio" class="btn-check" name="options-outlined" id="allIteams" autocomplete="off" checked>
                  <label class="btn btn-outline-primary" for="allIteams">All</label>
                  <input type="radio" class="btn-check" name="options-outlined" id="attemptedItem" autocomplete="off">
                  <label class="btn btn-outline-primary" for="attemptedItem">
                    <i class="bi bi-eye"></i> Attempted
                  </label> 
                  <input type="radio" class="btn-check" name="options-outlined" id="unattemptedItem" autocomplete="off">
                  <label class="btn btn-outline-primary" for="unattemptedItem">
                    <i class="bi bi-eye-slash"></i> Unattempted
                  </label>   
                </div>
              </li>  
              <?php $_smarty_tpl->_assignInScope('counter', 1);?>
              <div id="questionContent">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                    <div>
                      <a id="<?php echo $_smarty_tpl->tpl_vars['row']->value['content_id'];?>
" class="fw-bold text-decoration-none text-dark questionList" data-bs-dismiss="offcanvas" data-number="<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
" style="cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['counter']->value++;?>
: <?php echo $_smarty_tpl->tpl_vars['row']->value['snippet'];?>

                        <div id="<?php echo $_smarty_tpl->tpl_vars['row']->value['content_id'];?>
">
                          <span class="badge text-bg-warning text-light">Unattempted</span>  
                        </div> 
                      </a> 
                    </div>
                  
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>   
              </div>
              
          </ol>
        </div>
        <div>
          <!-- <ol class="list-group" id="ol-list">
            <?php $_smarty_tpl->_assignInScope('counter', 1);?>
             <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?> 
                <li class="list-group-item">
                  <a id="<?php echo $_smarty_tpl->tpl_vars['row']->value['content_id'];?>
" class="fw-bold text-decoration-none text-dark questionList" data-bs-dismiss="offcanvas" data-number="<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
" style="cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['counter']->value++;?>
: <?php echo $_smarty_tpl->tpl_vars['row']->value['snippet'];?>

                    <div class="attempt" id="<?php echo $_smarty_tpl->tpl_vars['row']->value['content_id'];?>
">
                      <span class="badge text-bg-warning text-light">Unattempted</span>  
                     </div> 
                  </a>  
                </li>  
             <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </ol> -->
        </div>
    </div>
</div> 


  <!--------- end modal ------------>
  <div class="modal fade" id="static" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-4" id="staticBackdropLabel">Confirmation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h2 class="text-center fs-5 mb-4">This action will end your test. Do you want to proceed?</h2>
          <div class="d-flex justify-content-evenly">
              <div class="fs-5">
                <div class="float-start"><span class="bi bi-list-ul postion-relative top-10 text-primary"></span></div>
                <span class="mx-2 fs-2 fw-bold"><?php echo $_smarty_tpl->tpl_vars['totalpage']->value;?>
</span>
              <div>Items</div> 
              </div>
              <div class="fs-5">
                <div class="float-start"><span class="bi bi-eye postion-relative top-10 text-primary"></span></div>
                <span class="mx-2 fs-2 fw-bold" id="attempted-question"></span>
              <div>Attempted</div> 
              </div>
              <div class="fs-5">
                <div class="float-start"><span class="bi bi-eye-slash postion-relative top-10 text-primary"></span></div>
                <span class="mx-2 fs-2 fw-bold" id="remening-question"></span>
              <div>Unattempted</div> 
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" id="No-cancel">Cancel</button>
          <button type="button" class="btn btn-primary" id="yes-cancel">End Test</button>
        </div>
      </div>
    </div>
  </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 position-fixed bottom-0">
                <ul class="pagination justify-content-center align-items-center bg-light border-top border-2 pt-2">
                    <i class="bi bi-stopwatch fs-2 mx-0"></i><div class="mx-3 fw-bold fs-5 text-dark" id="countTimer"></div>
                    <button class="page-link shadow-none fw-bold text-dark" id="list" type="button" data-bs-toggle="offcanvas" data-bs-target="#allItem">List</button>
                    <button class="page-link shadow-none mx-3 fw-bold text-dark previous" id="previous" type="button" data-id="<?php echo smarty_function_counter(array(),$_smarty_tpl);?>
" disabled style="cursor:not-allowed;">Previous</button>
                    <h6 class="pt-2"><span id="current_question">1</span> of <span id="total_question"><?php echo $_smarty_tpl->tpl_vars['totalpage']->value;?>
</span></h6>
                    <button class="page-link shadow-none mx-3 fw-bold text-dark next" id="next" type="button" data-id="<?php echo smarty_function_counter(array(),$_smarty_tpl);?>
">Next</button>
                    <button class="page-link shadow-none fw-bold text-dark" id="end-test" type="button" data-bs-toggle="modal" data-bs-target="#static">End Test</button>
                </ul>
            </div>
        </div>  
    </div>
 <?php $_smarty_tpl->_subTemplateRender('file:./inc/script.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
