<?php

/**
 * {template name=value}
 *
 * display template from name
 *
 * @param array $params parameters
 *
 * @return string
 */
function smarty_function_template($params, Smarty_Internal_Template $template)
{
    if (empty($params['var'])) {
        trigger_error("assign: missing 'var' parameter");
        return;
    }
    return "";
}

?>