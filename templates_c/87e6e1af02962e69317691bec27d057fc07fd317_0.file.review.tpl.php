<?php
/* Smarty version 4.3.0, created on 2023-02-05 18:51:05
  from 'C:\xampp\htdocs\MaaSharda\review.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63dfec89a8cf89_81912405',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '87e6e1af02962e69317691bec27d057fc07fd317' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MaaSharda\\review.tpl',
      1 => 1675619461,
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
function content_63dfec89a8cf89_81912405 (Smarty_Internal_Template $_smarty_tpl) {
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
 <?php $_smarty_tpl->_assignInScope('question', json_decode($_smarty_tpl->tpl_vars['question']->value,true));?>   
  <div class="container mt-5">
     <div class="row">
        <div class="col-lg-2 col-md-2 offset-4 col-4 mb-3">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['question']->value['Options'], 'option');
$_smarty_tpl->tpl_vars['option']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->do_else = false;
?>
                <?php if ($_smarty_tpl->tpl_vars['question']->value['Attempt'] == "Not Attempted" && $_smarty_tpl->tpl_vars['option']->value['is_correct']) {?>
                    <?php $_smarty_tpl->_assignInScope('correct_option', $_smarty_tpl->tpl_vars['option']->value['option_number']);?>
                    <div class="alert alert-secondary p-0 py-2 px-2" role="alert">
                        <i class="bi bi-eye-slash fs-5 ms-4"></i>
                        <span class="mx-2 fw-bold">Unattemped</span>
                      </div>
                <?php } else { ?>
                    <?php if ($_smarty_tpl->tpl_vars['question']->value['Attempt'] == $_smarty_tpl->tpl_vars['option']->value['id']) {?>
                        <?php if ($_smarty_tpl->tpl_vars['option']->value['is_correct']) {?>
                            <?php $_smarty_tpl->_assignInScope('correct_option', $_smarty_tpl->tpl_vars['option']->value['option_number']);?>
                            <div class="alert alert-success p-0 py-2 px-2" role="alert">
                                <i class="bi bi-check-lg fs-5 ms-4"></i>
                                <span class="mx-2 fw-bold">Correct</span>
                            </div>
                        <?php } else { ?>
                        <div class="alert alert-danger p-0 py-2 px-2" role="alert">
                            <i class="bi bi-x-lg fs-5 ms-4"></i>
                            <span class="mx-2 fw-bold">Wrong</span>
                        </div>
                        <?php }?>
                    <?php }?>
                <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
        </div>                      
        </div>
        <div class="col-lg-12 col-md-12 col-12 mb-3">
            <div class="fs-4 mb-5 bg-light shadow p-4">Question:
               <span class="Question fs-5" id="<?php echo $_smarty_tpl->tpl_vars['question']->value['Content_id'];?>
"></span>
            </div>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['question']->value['Options'], 'option');
$_smarty_tpl->tpl_vars['option']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->do_else = false;
?>
                <?php if ($_smarty_tpl->tpl_vars['question']->value['Attempt'] == "Not Attempted" && $_smarty_tpl->tpl_vars['option']->value['is_correct']) {?>
                    <?php $_smarty_tpl->_assignInScope('correct_option', $_smarty_tpl->tpl_vars['option']->value['option_number']);?>
                    <div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">
                        <div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">
                            <label class="btn btn-success fw-bold" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
</label>
                            <input type="radio" disabled="disabled" name="ansChecked"  class="form-check-input options mx-2 bg-success" id="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
">
                        </div>
                        <label class="form-check-label d-line-block" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['answer'];?>
</label><br>
                    </div>
                <?php } else { ?>
                    <?php if ($_smarty_tpl->tpl_vars['question']->value['Attempt'] == $_smarty_tpl->tpl_vars['option']->value['id']) {?>
                        <?php if ($_smarty_tpl->tpl_vars['option']->value['is_correct']) {?>
                            <?php $_smarty_tpl->_assignInScope('correct_option', $_smarty_tpl->tpl_vars['option']->value['option_number']);?>
                            <div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">
                                <div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">
                                    <label class="btn btn-success fw-bold" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
</label>
                                    <input type="radio" disabled="disabled" name="ansChecked" class="form-check-input options mx-2 bg-success" id="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"/>
                                </div>
                                <label class="form-check-label d-line-block" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['answer'];?>
</label><br>
                            </div>
                        <?php } else { ?>
                            <div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-2 py-1"> 
                                    <i class="bi bi-x-lg text-danger fw-bold"></i>
                                <div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">
                                    <label class="btn btn-danger fw-bold" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
</label>
                                    <input type="radio" disabled="disabled" name="ansChecked" class="form-check-input options mx-2 bg-danger" id="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
">
                                </div>
                                <label class="form-check-label d-line-block" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['answer'];?>
</label><br>
                            </div>
                        <?php }?>
                    <?php } else { ?>
                        <?php if ($_smarty_tpl->tpl_vars['option']->value['is_correct']) {?>
                            <?php $_smarty_tpl->_assignInScope('correct_option', $_smarty_tpl->tpl_vars['option']->value['option_number']);?>
                            <div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">
                                <div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">
                                    <label class="btn btn-success fw-bold" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
</label>
                                    <input type="radio" disabled="disabled" name="ansChecked" class="form-check-input options mx-2 bg-success" id="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"/>
                                </div>
                                <label class="form-check-label d-line-block" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['answer'];?>
</label><br>
                            </div>
                        <?php } else { ?>
                        <div class="form-check d-flex jsutify-content-center align-items-center m-0 mb-1 p-0 ps-4 py-1">
                            <div class="d-flex jsutify-content-center align-items-center m-0 border border-1 mx-2 rounded-2">
                                <label class="btn btn-light fw-bold" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
</label>
                                <input type="radio" disabled="disabled" name="ansChecked" class="form-check-input options mx-2" id="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
">
                            </div>
                            <label class="form-check-label d-line-block" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['answer'];?>
</label><br>
                        </div>
                        <?php }?>
                    <?php }?>
                <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>         
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
                    <h6><span id="current_question"><?php echo $_smarty_tpl->tpl_vars['question']->value['Number'];?>
</span> of <span id="total_question"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span></h6>
                    <button class="page-link shadow-none mx-3 fw-bold text-dark next" id="next" type="button" value="submit">Next</button>
                    <a href="result.php" id="result" class="page-link  shadow-none mx-3 fw-bold text-dark next">Result</a>
                </ul>
            </div>
        </div>  
    </div>
 <?php $_smarty_tpl->_subTemplateRender('file:./inc/script.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
