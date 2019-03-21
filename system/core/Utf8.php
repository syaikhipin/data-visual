<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

defined("BASEPATH") or exit("No direct script access allowed");
/**
 * Utf8 Class
 *
 * Provides support for UTF-8 environments
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	UTF-8
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/libraries/utf8.html
 */
class CI_Utf8
{
    /**
     * Class constructor
     *
     * Determines if UTF-8 support is to be enabled.
     *
     * @return	void
     */
    public function __construct($charset)
    {
        if (defined("PREG_BAD_UTF8_ERROR") && (ICONV_ENABLED === true || MB_ENABLED === true) && $charset === "UTF-8") {
            define("UTF8_ENABLED", true);
            log_message("info", "UTF-8 Support Enabled");
        } else {
            define("UTF8_ENABLED", false);
            log_message("info", "UTF-8 Support Disabled");
        }
        log_message("info", "Utf8 Class Initialized");
    }
    /**
     * Clean UTF-8 strings
     *
     * Ensures strings contain only valid UTF-8 characters.
     *
     * @param	string	$str	String to clean
     * @return	string
     */
    public function clean_string($str)
    {
        if ($this->is_ascii($str) === false) {
            if (MB_ENABLED) {
                $str = mb_convert_encoding($str, "UTF-8", "UTF-8");
            } else {
                if (ICONV_ENABLED) {
                    $str = @iconv("UTF-8", "UTF-8//IGNORE", $str);
                }
            }
        }
        return $str;
    }
    /**
     * Remove ASCII control characters
     *
     * Removes all ASCII control characters except horizontal tabs,
     * line feeds, and carriage returns, as all others can cause
     * problems in XML.
     *
     * @param	string	$str	String to clean
     * @return	string
     */
    public function safe_ascii_for_xml($str)
    {
        return remove_invisible_characters($str, false);
    }
    /**
     * Convert to UTF-8
     *
     * Attempts to convert a string to UTF-8.
     *
     * @param	string	$str		Input string
     * @param	string	$encoding	Input encoding
     * @return	string	$str encoded in UTF-8 or FALSE on failure
     */
    public function convert_to_utf8($str, $encoding)
    {
        if (MB_ENABLED) {
            return mb_convert_encoding($str, "UTF-8", $encoding);
        }
        if (ICONV_ENABLED) {
            return @iconv($encoding, "UTF-8", $str);
        }
        return false;
    }
    /**
     * Is ASCII?
     *
     * Tests if a string is standard 7-bit ASCII or not.
     *
     * @param	string	$str	String to check
     * @return	bool
     */
    public function is_ascii($str)
    {
        return preg_match("/[^\\x00-\\x7F]/S", $str) === 0;
    }
}

?>