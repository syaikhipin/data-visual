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
 * Smarty Method CompileAllTemplates
 *
 * Smarty::compileAllTemplates() method
 *
 * @package    Smarty
 * @subpackage PluginsInternal
 * @author     Uwe Tews
 */
class Smarty_Internal_Method_CompileAllTemplates
{
    /**
     * Valid for Smarty object
     *
     * @var int
     */
    public $objMap = 1;
    /**
     * Compile all template files
     *
     * @api  Smarty::compileAllTemplates()
     *
     * @param \Smarty $smarty        passed smarty object
     * @param  string $extension     file extension
     * @param  bool   $force_compile force all to recompile
     * @param  int    $time_limit
     * @param  int    $max_errors
     *
     * @return integer number of template files recompiled
     */
    public function compileAllTemplates(Smarty $smarty, $extension = ".tpl", $force_compile = false, $time_limit = 0, $max_errors = NULL)
    {
        return $this->compileAll($smarty, $extension, $force_compile, $time_limit, $max_errors);
    }
    /**
     * Compile all template or config files
     *
     * @param \Smarty $smarty
     * @param  string $extension     template file name extension
     * @param  bool   $force_compile force all to recompile
     * @param  int    $time_limit    set maximum execution time
     * @param  int    $max_errors    set maximum allowed errors
     * @param bool    $isConfig      flag true if called for config files
     *
     * @return int number of template files compiled
     */
    protected function compileAll(Smarty $smarty, $extension, $force_compile, $time_limit, $max_errors, $isConfig = false)
    {
        if (function_exists("set_time_limit")) {
            @set_time_limit($time_limit);
        }
        $_count = 0;
        $_error_count = 0;
        $sourceDir = $isConfig ? $smarty->getConfigDir() : $smarty->getTemplateDir();
        foreach ($sourceDir as $_dir) {
            $_dir_1 = new RecursiveDirectoryIterator($_dir, defined("FilesystemIterator::FOLLOW_SYMLINKS") ? FilesystemIterator::FOLLOW_SYMLINKS : 0);
            $_dir_2 = new RecursiveIteratorIterator($_dir_1);
            foreach ($_dir_2 as $_fileinfo) {
                $_file = $_fileinfo->getFilename();
                if (substr(basename($_fileinfo->getPathname()), 0, 1) === "." || strpos($_file, ".svn") !== false) {
                    continue;
                }
                if (!substr_compare($_file, $extension, 0 - strlen($extension)) === 0) {
                    continue;
                }
                if ($_fileinfo->getPath() !== substr($_dir, 0, -1)) {
                    $_file = substr($_fileinfo->getPath(), strlen($_dir)) . DIRECTORY_SEPARATOR . $_file;
                }
                echo "\n<br>";
                echo $_dir;
                echo "---";
                echo $_file;
                flush();
                $_start_time = microtime(true);
                $_smarty = clone $smarty;
                $_smarty->_cache = array();
                $_smarty->ext = new Smarty_Internal_Extension_Handler();
                $_smarty->ext->objType = $_smarty->_objType;
                $_smarty->force_compile = $force_compile;
                try {
                    $_tpl = new $smarty->template_class($_file, $_smarty);
                    $_tpl->caching = Smarty::CACHING_OFF;
                    $_tpl->source = $isConfig ? Smarty_Template_Config::load($_tpl) : Smarty_Template_Source::load($_tpl);
                    if ($_tpl->mustCompile()) {
                        $_tpl->compileTemplateSource();
                        $_count++;
                        echo " compiled in  ";
                        echo microtime(true) - $_start_time;
                        echo " seconds";
                        flush();
                    } else {
                        echo " is up to date";
                        flush();
                    }
                } catch (Exception $e) {
                    echo "\n<br>        ------>Error: ";
                    echo $e->getMessage();
                    echo "<br><br>\n";
                    $_error_count++;
                }
                unset($_tpl);
                $_smarty->_clearTemplateCache();
                if ($max_errors !== NULL && $_error_count === $max_errors) {
                    echo "\n<br><br>too many errors\n";
                    exit(1);
                }
            }
        }
        echo "\n<br>";
        return $_count;
    }
}

?>