<?php

function smarty_modifier_to($value)
{
    if (is_string($value)) {
        $arr = explode('-', $value);
        if (count($arr) == 2) {
            return trim($arr[1]);
        }
    }
    return $value;
}

?>