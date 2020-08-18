<?php /* Smarty version 2.6.18, created on 2020-07-21 17:36:31
         compiled from header.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title><?php echo $this->_tpl_vars['title']; ?>
</title>
    <link rel="stylesheet" type="text/css" media="screen" href="/css/style.css">
</head>
<body>
<div id="header">
    <h1><a href="<?php echo $this->_tpl_vars['base_url']; ?>
">Mini Blog</a></h1>
</div>

<div id="nav">
    <p>
        <?php if ($this->_tpl_vars['session']->isAuthenticated()): ?>
            <a href="<?php echo $this->_tpl_vars['base_url']; ?>
/">ホーム</a>
            <a href="<?php echo $this->_tpl_vars['base_url']; ?>
/account">アカウント</a>
        <?php else: ?>
            <a href="<?php echo $this->_tpl_vars['base_url']; ?>
/account/signin">ログイン</a>
            <a href="<?php echo $this->_tpl_vars['base_url']; ?>
/account/signup">アカウント登録</a>
        <?php endif; ?>
    </p>
</div>

<div id="main">