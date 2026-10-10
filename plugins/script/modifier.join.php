<?php

function smarty_modifier_join($value)
{
    if (is_array($value)) {
        $CI =& get_instance();
        $newvalue = array();
        foreach ($value as $item) {
            $newvalue[] = $CI->db->escape($item);
        }
        return implode(", ", $newvalue);
    }
    return $value;
}

?>