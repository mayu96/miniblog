<?php /* Smarty version 2.6.18, created on 2020-07-29 11:05:44
         compiled from account/signin.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>

<h2>ログイン</h2>

<p>
    <a href="<?php echo $this->_tpl_vars['base_url']; ?>
/account/signup">新規ユーザ登録</a>
</p>

<form action="<?php echo $this->_tpl_vars['base_url']; ?>
/account/authenticate" method="post">
    <input type="hidden" name="_token" value="<?php echo $this->_tpl_vars['_token']; ?>
">

    <?php if (isset ( $this->_tpl_vars['errors'] ) && count ( $this->_tpl_vars['errors'] ) > 0): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'errors.tpl', 'smarty_include_vars' => array('links' => $this->_tpl_vars['errors'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'account/inputs.tpl', 'smarty_include_vars' => array('links' => ($this->_tpl_vars['user_name']).",".($this->_tpl_vars['password']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



    <p>
        <input type="submit" value="ログイン" <?php echo '?>'; ?>

    </p>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>