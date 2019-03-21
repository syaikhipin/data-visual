<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */
/**
 * Smarty Method CompileAllConfig
 *
 * Smarty::compileAllConfig() method
 *
 * @package    Smarty
 * @subpackage PluginsInternal
 * @author     Uwe Tews
 */
class Smarty_Internal_Method_CompileAllConfig extends Smarty_Internal_Method_CompileAllTemplates
{
    /**
     * Compile all config files
     *
     * @api  Smarty::compileAllConfig()
     *
     * @param \Smarty $smarty        passed smarty object
     * @param  string $extension     file extension
     * @param  bool   $force_compile force all to recompile
     * @param  int    $time_limit
     * @param  int    $max_errors
     *
     * @return int number of template files recompiled
     */
    public function compileAllConfig(Smarty $smarty, $extension = ".conf", $force_compile = false, $time_limit = 0, $max_errors = NULL)
    {
        return $this->compileAll($smarty, $extension, $force_compile, $time_limit, $max_errors, true);
    }
}

?>