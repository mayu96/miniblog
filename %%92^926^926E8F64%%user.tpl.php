<?php /* Smarty version 2.6.18, created on 2020-07-30 12:51:54
         compiled from status/user.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>

<h2><?php echo $this->_tpl_vars['user']['user_name']; ?>
</h2>

<?php if (! is_null ( $this->_tpl_vars['following'] )): ?>
<?php if ($this->_tpl_vars['following']): ?>
<p>フォローしています</p>
<?php else: ?>
<form action="<?php echo $this->_tpl_vars['base_url']; ?>
/follow" method="post">
    <input type="hidden" name="_token" value="<?php echo $this->_tpl_vars['_token']; ?>
" >
    <input type="hidden" name="following_name" value="<?php echo $this->_tpl_vars['user']['user_name']; ?>
">

    <input type="submit" value="フォローする">
</form>
<?php endif; ?>
<?php endif; ?>


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