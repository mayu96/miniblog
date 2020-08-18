<?php

require 'Smarty.class.php';

$smarty = new Smarty();


$smarty->assign('name', gethostname());

//** 次の行のコメントをはずすと、デバッギングコンソールを表示します
//$smarty->debugging = true;

$smarty->display('sample.tpl');

