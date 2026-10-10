<?php

function smarty_modifier_from($value)
{
    if (is_string($value)) {
        $arr = explode('-', $value);
        if (count($arr) == 2) {
            return trim($arr[0]);
        }
    }
    return $value;
}

?>