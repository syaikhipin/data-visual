<?php

/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 */
/**
 * {serverside}
 * use serverside
 * @param array $params parameters
 *
 * @return string
 */
function smarty_function_serverside($params)
{
    $CI =& get_instance();
    $CI->config->set_item('tabular_serverside', TRUE);
}

?>