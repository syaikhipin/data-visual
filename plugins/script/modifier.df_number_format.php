<?php

/**
 * use PHP number format to format the target value
 */
function smarty_modifier_df_number_format($number, $format = 'none', $decimal_place = 0, $symbol = '')
{
    if (!is_numeric($number)) {
        return $number;
    }
    $dec_point = '.';
    $thousands_sep = ',';
    switch ($format) {
        case '1':
            $dec_point = ',';
            $thousands_sep = '.';
            break;
        case '2':
            $dec_point = ',';
            $thousands_sep = '';
            break;
        case '3':
            $dec_point = ',';
            $thousands_sep = ' ';
            break;
        case '4':
            $dec_point = '.';
            $thousands_sep = '';
            break;
        case '5':
            $dec_point = '.';
            $thousands_sep = ',';
            break;
    }
    $formatted_str = number_format($number, $decimal_place, $dec_point, $thousands_sep);
    if ($symbol != '') {
        $formatted_str = $symbol . $formatted_str;
    }
    return $formatted_str;
}

?>