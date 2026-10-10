<?php

function smarty_modifier_usercolumn($params)
{
    $str = $params;
    // replace _ to " "
    $str = str_replace('_', ' ', $str);
    $str = str_replace('-', ' ', $str);
    return $str;
}

?>