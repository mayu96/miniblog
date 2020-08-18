<?php /* Smarty version 2.6.18, created on 2020-07-29 11:05:28
         compiled from status/index.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>

<h2>ホーム</h2>

<form action="<?php echo $this->_tpl_vars['base_url']; ?>
/status/post" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo $this->_tpl_vars['_token']; ?>
" >

    <?php if (isset ( $this->_tpl_vars['errors'] ) && count ( $this->_tpl_vars['errors'] ) > 0): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'errors.tpl', 'smarty_include_vars' => array('links' => $this->_tpl_vars['errors'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>

    <textarea name="body" row="2" cols="60"><?php echo $this->_tpl_vars['body']; ?>
</textarea>

        <p>
    <div class="element_wrap">
        <label>画像ファイルの添付</label>
        <input type="file" name="upimg">
    </div>
    </p>

    <p>
        <input type="submit" value="発言">
    </p>

</form>

<div id="statuses">
    <?php $_from = $this->_tpl_vars['statuses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['status']):
?>

            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'status/status.tpl', 'smarty_include_vars' => array('links' => $this->_tpl_vars['status'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endforeach; endif; unset($_from); ?>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>




