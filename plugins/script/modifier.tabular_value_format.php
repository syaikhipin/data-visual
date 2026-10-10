<?php

/**
 * use PHP number format to format the target value
 */
function smarty_modifier_tabular_value_format($val, $series_option)
{
    if (!$series_option || !isset($series_option['format']) || $series_option['format'] == 'none') {
        return $val;
    }
    $format = $series_option['format'];
    if ($format == 'number') {
        if (!is_numeric($val)) {
            return $val;
        }
        $decimal = isset($series_option['decimal']) && is_numeric($series_option['decimal']) ? $series_option['decimal'] : 0;
        return number_format($val, (int) $decimal);
    } else {
        if ($format == 'percent') {
            return $val . '%';
        } else {
            if ($format == 'currency') {
                if (!is_numeric($val)) {
                    return $val;
                }
                $decimal = isset($series_option['decimal']) && is_numeric($series_option['decimal']) ? $series_option['decimal'] : 0;
                $symbol = isset($series_option['currency']) && $series_option['currency'] != 'none' ? $series_option['currency'] : '';
                return $symbol . number_format($val, $decimal);
            }
        }
    }
    return $val;
}

?>