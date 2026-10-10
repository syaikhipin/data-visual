<?php

/**
 * Smarty Internal Plugin Compile Debug Class
 *
 * @package    Smarty
 * @subpackage Compiler
 */
class Smarty_Internal_Compile_Debug extends Smarty_Internal_CompileBase
{
    /**
     * Compiles code for the {debug} tag
     *
     * @param  array  $args     array with attributes from parser
     * @param  object $compiler compiler object
     *
     * @return string compiled code
     */
    public function compile($args, $compiler)
    {
        $_attr = $this->getAttributes($compiler, $args);
        $compiler->tag_nocache = true;
        $_output = "<?php \$_smarty_debug = new Smarty_Internal_Debug;\n \$_smarty_debug->display_debug(\$_smarty_tpl);\n";
        $_output .= "unset(\$_smarty_debug);\n?>";
        return $_output;
    }
}

?>