<?php
function smarty_modifier_mbkana($string, $option = 'kVas') {
   return mb_convert_kana($string, $option);
}
?>