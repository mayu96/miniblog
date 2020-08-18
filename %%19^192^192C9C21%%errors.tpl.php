<?php /* Smarty version 2.6.18, created on 2020-07-21 17:54:54
         compiled from errors.tpl */ ?>

<ul class="error_list">
    <?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
        <li><?php echo $this->_tpl_vars['error']; ?>
</li>
    <?php endforeach; endif; unset($_from); ?>
</ul>

