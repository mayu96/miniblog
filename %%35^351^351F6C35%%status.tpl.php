<?php /* Smarty version 2.6.18, created on 2020-07-22 18:27:26
         compiled from status/status.tpl */ ?>
<div class="status">
    <div class="status_content">
        <a href="<?php echo $this->_tpl_vars['base_url']; ?>
/user/<?php echo $this->_tpl_vars['status']['user_name']; ?>
">
            <?php echo $this->_tpl_vars['status']['user_name']; ?>

        </a>
        <?php echo $this->_tpl_vars['status']['body']; ?>

    </div>
    <div>
        <a href="<?php echo $this->_tpl_vars['base_url']; ?>
/user/<?php echo $this->_tpl_vars['status']['user_name']; ?>
/status/<?php echo $this->_tpl_vars['status']['id']; ?>
">
            <?php echo $this->_tpl_vars['status']['created_at']; ?>

        </a>
    </div>
    <div>


    </div>
</div>