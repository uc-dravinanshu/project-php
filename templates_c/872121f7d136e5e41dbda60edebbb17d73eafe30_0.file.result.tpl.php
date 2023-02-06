<?php
/* Smarty version 4.3.0, created on 2023-02-04 16:29:28
  from 'C:\xampp\htdocs\MaaSharda\result.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63de79d8e72123_52990126',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '872121f7d136e5e41dbda60edebbb17d73eafe30' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MaaSharda\\result.tpl',
      1 => 1675524565,
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
function content_63de79d8e72123_52990126 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
            <div class="col-lg-12 col-md-12 col-12 mb-3">
              <div class="col-lg-12">
                <div class="col-lg-12 col-md-12 col-12 mb-3">
                  <div class="text-center">
                    <h2 class="mb-3">Result</h2>
                      <div class="btn-group mt-1">
                        <button class="btn btn-outline-light text-dark p-0 px-4 py-2 border border-primary">
                          <span class="bi bi-mortarboard-fill d-block text-success fw-bold fs-5">
                            <span class="mx-1"><?php echo $_smarty_tpl->tpl_vars['correct']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>
                            </span>
                          <span class="fs-6" tabindex="0" aria-label="All Items">Results</span> 
                        </button>
                      </div>
                      <div class="btn-group mt-1">
                        <button class="btn btn-outline-light text-dark p-0 px-4 py-2 border border-primary">
                          <span class="bi bi-list-ul d-block text-primary fw-bold fs-5">
                            <span class="mx-1" id="total_question"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>
                            </span>
                          <span class="fs-6" tabindex="0" aria-label="All Items">Items</span> 
                        </button>
                      </div>
                      <div class="btn-group mt-1">
                        <button class="btn btn-outline-light text-dark p-0 px-4 py-2 border border-primary">
                          <span class="bi bi-check-lg d-block text-success fw-bold fs-5">
                            <span class="mx-1" id="correct"><?php echo $_smarty_tpl->tpl_vars['correct']->value;?>
</span>
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
                           <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                              <?php $_smarty_tpl->_assignInScope('options', json_decode(selected_question($_smarty_tpl->tpl_vars['row']->value['content_id']),true));?>
                              <?php $_smarty_tpl->_assignInScope('options', $_smarty_tpl->tpl_vars['options']->value['Options']);?>
                              <?php $_smarty_tpl->_assignInScope('number', json_decode(selected_question($_smarty_tpl->tpl_vars['row']->value['content_id']),true));?>
                              <?php $_smarty_tpl->_assignInScope('number', $_smarty_tpl->tpl_vars['number']->value['Number']);?>
                              <tr class="justify-content-center">
                                <th>  
                                   <?php echo $_smarty_tpl->tpl_vars['number']->value;?>

                                </th>
                                <th>
                                  <a href="review.php?content_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['content_id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['row']->value['content_id'];?>
" class="text-decoration-none  questionResult" style="font-size: 17px;"><?php echo $_smarty_tpl->tpl_vars['row']->value['snippet'];?>
</a>
                                </th>  
                                <th>
                                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['options']->value, 'opt');
$_smarty_tpl->tpl_vars['opt']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['opt']->value) {
$_smarty_tpl->tpl_vars['opt']->do_else = false;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['session']->value[$_smarty_tpl->tpl_vars['row']->value['content_id']] == "Not Attempted") {?>
                                      <?php if ($_smarty_tpl->tpl_vars['opt']->value['is_correct'] == 1) {?>
                                       <div class="d-inline-block p-0 py-2">
                                        <span class="alert alert-success rounded-circle px-2 py-1"><?php echo $_smarty_tpl->tpl_vars['opt']->value['option_number'];?>
</span>
                                       </div>
                                       <?php } else { ?>
                                        <div class="d-inline-block p-0 py-2">
                                          <span class="alert alert-secondary rounded-circle px-2 py-1"><?php echo $_smarty_tpl->tpl_vars['opt']->value['option_number'];?>
</span>
                                        </div>
                                       <?php }?> 
                                    <?php } elseif ($_smarty_tpl->tpl_vars['session']->value[$_smarty_tpl->tpl_vars['row']->value['content_id']] == $_smarty_tpl->tpl_vars['opt']->value['id']) {?>
                                      <?php if ($_smarty_tpl->tpl_vars['opt']->value['is_correct'] == 1) {?>
                                      <div class="d-inline-block p-0 py-2">
                                        <span class="alert alert-success rounded-circle px-2 py-1"><?php echo $_smarty_tpl->tpl_vars['opt']->value['option_number'];?>
</span>
                                      </div>
                                      <?php } else { ?>
                                      <div class="d-inline-block p-0 py-2">
                                        <span class="alert alert-danger rounded-circle px-2 py-1"><?php echo $_smarty_tpl->tpl_vars['opt']->value['option_number'];?>
</span>
                                      </div>
                                      <?php }?>
                                     <?php } elseif ($_smarty_tpl->tpl_vars['opt']->value['is_correct'] == 1) {?>
                                     <div class="d-inline-block p-0 py-2">
                                       <span class="alert alert-success rounded-circle px-2 py-1"><?php echo $_smarty_tpl->tpl_vars['opt']->value['option_number'];?>
</span>
                                     </div>
                                     <?php } else { ?>
                                     <div class="d-inline-block p-0 py-2">
                                      <span class="alert alert-secondary rounded-circle px-2 py-1"><?php echo $_smarty_tpl->tpl_vars['opt']->value['option_number'];?>
</span>
                                     </div>
                                    <?php }?>
                                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </th>
                                <th>
                                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['options']->value, 'opt');
$_smarty_tpl->tpl_vars['opt']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['opt']->value) {
$_smarty_tpl->tpl_vars['opt']->do_else = false;
?>
                                  <?php if ($_smarty_tpl->tpl_vars['session']->value[$_smarty_tpl->tpl_vars['row']->value['content_id']] == "Not Attempted") {?>
                                    <?php if ($_smarty_tpl->tpl_vars['opt']->value['is_correct'] == 1) {?> 
                                      <div class="bi bi-eye-slash-fill fs-5 text-warning" id="<?php echo $_smarty_tpl->tpl_vars['row']->value['content_id'];?>
"></div>
                                     <?php }?> 
                                  <?php } elseif ($_smarty_tpl->tpl_vars['session']->value[$_smarty_tpl->tpl_vars['row']->value['content_id']] == $_smarty_tpl->tpl_vars['opt']->value['id']) {?>
                                    <?php if ($_smarty_tpl->tpl_vars['opt']->value['is_correct'] == 1) {?>
                                      <div class="bi bi-check-lg fs-5 text-success" id="<?php echo $_smarty_tpl->tpl_vars['row']->value['content_id'];?>
"></div>
                                    <?php } else { ?>
                                      <div class="bi bi-x-lg fs-5 text-danger" id="<?php echo $_smarty_tpl->tpl_vars['row']->value['content_id'];?>
"></div>
                                    <?php }?>
                                  <?php }?>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </th>
                              </tr>
                           <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
 <?php $_smarty_tpl->_subTemplateRender('file:./inc/script.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
