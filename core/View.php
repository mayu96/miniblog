<?php
class View
{
    protected $base_dir;
    protected $dafaults;
    protected $layout_variables = array();

    public function __construct($base_dir, $dafaults = array())
    {
        $this->base_dir = $base_dir;
        $this->defaults = $dafaults;
    }

    public function setLayoutVar($name, $value)
    {
        $this->layout_variables[$name] = $value;
    }

    public function render($_path, $_variables = array(), $_layout = false, $smarty)
    {


        $smarty->template_dir = './templates/';
        $smarty->compile_dir  = './templates_c/';
        $smarty->config_dir   = './configs/';
        $smarty->cache_dir    = './cache/';


        extract(array_merge($this->defaults, $_variables));


        $_file = $this->base_dir . '/' . $_path . '.tpl';


        return $smarty->fetch($_path . '.tpl');
    }

    public function escape($string)
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
}