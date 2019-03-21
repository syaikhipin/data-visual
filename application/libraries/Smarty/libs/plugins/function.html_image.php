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
 * Smarty {html_image} function plugin
 * Type:     function
 * Name:     html_image
 * Date:     Feb 24, 2003
 * Purpose:  format HTML tags for the image
 * Examples: {html_image file="/images/masthead.gif"}
 * Output:   <img src="/images/masthead.gif" width=400 height=23>
 * Params:
 *
 * - file        - (required) - file (and path) of image
 * - height      - (optional) - image height (default actual height)
 * - width       - (optional) - image width (default actual width)
 * - basedir     - (optional) - base directory for absolute paths, default is environment variable DOCUMENT_ROOT
 * - path_prefix - prefix for path output (optional, default empty)
 *
 *
 * @link    http://www.smarty.net/manual/en/language.function.html.image.php {html_image}
 *          (Smarty online manual)
 * @author  Monte Ohrt <monte at ohrt dot com>
 * @author  credits to Duda <duda@big.hu>
 * @version 1.0
 *
 * @param array                    $params   parameters
 * @param Smarty_Internal_Template $template template object
 *
 * @throws SmartyException
 * @return string
 * @uses    smarty_function_escape_special_chars()
 */
function smarty_function_html_image($params, Smarty_Internal_Template $template)
{
    $template->_checkPlugins(array(array("function" => "smarty_function_escape_special_chars", "file" => SMARTY_PLUGINS_DIR . "shared.escape_special_chars.php")));
    $alt = "";
    $file = "";
    $height = "";
    $width = "";
    $extra = "";
    $prefix = "";
    $suffix = "";
    $path_prefix = "";
    $basedir = isset($_SERVER["DOCUMENT_ROOT"]) ? $_SERVER["DOCUMENT_ROOT"] : "";
    foreach ($params as $_key => $_val) {
        switch ($_key) {
            case "file":
            case "height":
            case "width":
            case "dpi":
            case "path_prefix":
            case "basedir":
                ${$_key} = $_val;
                break;
            case "alt":
                if (!is_array($_val)) {
                    ${$_key} = smarty_function_escape_special_chars($_val);
                    break;
                }
                throw new SmartyException("html_image: extra attribute '" . $_key . "' cannot be an array", 1024);
            case "link":
            case "href":
                $prefix = "<a href=\"" . $_val . "\">";
                $suffix = "</a>";
                break;
            default:
                if (!is_array($_val)) {
                    $extra .= " " . $_key . "=\"" . smarty_function_escape_special_chars($_val) . "\"";
                    break;
                }
                throw new SmartyException("html_image: extra attribute '" . $_key . "' cannot be an array", 1024);
        }
    }
    if (empty($file)) {
        trigger_error("html_image: missing 'file' parameter", 1024);
        return NULL;
    }
    if ($file[0] === "/") {
        $_image_path = $basedir . $file;
    } else {
        $_image_path = $file;
    }
    if (stripos($params["file"], "file://") === 0) {
        $params["file"] = substr($params["file"], 7);
    }
    $protocol = strpos($params["file"], "://");
    if ($protocol !== false) {
        $protocol = strtolower(substr($params["file"], 0, $protocol));
    }
    if (isset($template->smarty->security_policy)) {
        if ($protocol) {
            if (!$template->smarty->security_policy->isTrustedUri($params["file"])) {
                return NULL;
            }
        } else {
            if (!$template->smarty->security_policy->isTrustedResourceDir($_image_path)) {
                return NULL;
            }
        }
    }
    if (!isset($params["width"]) || !isset($params["height"])) {
        if (!($_image_data = @getimagesize($_image_path))) {
            if (!file_exists($_image_path)) {
                trigger_error("html_image: unable to find '" . $_image_path . "'", 1024);
                return NULL;
            }
            if (!is_readable($_image_path)) {
                trigger_error("html_image: unable to read '" . $_image_path . "'", 1024);
                return NULL;
            }
            trigger_error("html_image: '" . $_image_path . "' is not a valid image file", 1024);
            return NULL;
        }
        if (!isset($params["width"])) {
            $width = $_image_data[0];
        }
        if (!isset($params["height"])) {
            $height = $_image_data[1];
        }
    }
    if (isset($params["dpi"])) {
        if (strstr($_SERVER["HTTP_USER_AGENT"], "Mac")) {
            $dpi_default = 72;
        } else {
            $dpi_default = 96;
        }
        $_resize = $dpi_default / $params["dpi"];
        $width = round($width * $_resize);
        $height = round($height * $_resize);
    }
    return $prefix . "<img src=\"" . $path_prefix . $file . "\" alt=\"" . $alt . "\" width=\"" . $width . "\" height=\"" . $height . "\"" . $extra . " />" . $suffix;
}

?>