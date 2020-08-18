<?php /* Smarty version 2.6.18, created on 2020-07-29 11:05:36
         compiled from account/index.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>

<h2>アカウント</h2>

<p>
    ユーザーID:
    <a href="<?php echo $this->_tpl_vars['base_url']; ?>
/user/<?php echo $this->_tpl_vars['user']['user_name']; ?>
">
        <strong><?php echo $this->_tpl_vars['user']['user_name']; ?>
</strong>
    </a>
</p>

<ul>
    <li>
        <a href="<?php echo $this->_tpl_vars['base_url']; ?>
">ホーム</a>
    </li>
    <li>
        <a href="<?php echo $this->_tpl_vars['base_url']; ?>
/account/signout">ログアウト</a>
    </li>
</ul>

<h3>フォロー中</h3>

<?php if (count ( $this->_tpl_vars['followings'] ) > 0): ?>
<ul>
    <?php $_from = $this->_tpl_vars['followings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['following']):
?>
    <li>
        <a href="<?php echo $this->_tpl_vars['base_url']; ?>
/user/<?php echo $this->_tpl_vars['following']['user_name']; ?>
">
            <?php echo $this->_tpl_vars['following']['user_name']; ?>

        </a>
    </li>
    <?php endforeach; endif; unset($_from); ?>
</ul>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>