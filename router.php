<?php
/**
 * Router for `php -S` oracle boot: stand in for the .htaccess rewrite rules
 * (serve real files and directories, route everything else through index.php).
 */
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$file = __DIR__ . $uri;
if ($uri !== '/' && file_exists($file) && !is_dir($file) && pathinfo($file, PATHINFO_EXTENSION) !== 'php') {
    return false; // static asset
}
if ($uri !== '/' && file_exists($file) && pathinfo($file, PATHINFO_EXTENSION) === 'php' && realpath($file) !== realpath(__DIR__ . '/index.php') && realpath($file) !== realpath(__FILE__)) {
    return false; // other entry scripts (e.g. config/loader-wizard.php)
}
$_SERVER['PATH_INFO'] = $uri;
require __DIR__ . '/index.php';
