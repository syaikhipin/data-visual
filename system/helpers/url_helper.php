<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

defined("BASEPATH") or exit("No direct script access allowed");
if (!function_exists("site_url")) {
    /**
     * Site URL
     *
     * Create a local URL based on your basepath. Segments can be passed via the
     * first parameter either as a string or an array.
     *
     * @param	string	$uri
     * @param	string	$protocol
     * @return	string
     */
    function site_url($uri = "", $protocol = NULL)
    {
        return get_instance()->config->site_url($uri, $protocol);
    }
}
if (!function_exists("base_url")) {
    /**
     * Base URL
     *
     * Create a local URL based on your basepath.
     * Segments can be passed in as a string or an array, same as site_url
     * or a URL to a file can be passed in, e.g. to an image file.
     *
     * @param	string	$uri
     * @param	string	$protocol
     * @return	string
     */
    function base_url($uri = "", $protocol = NULL)
    {
        return get_instance()->config->base_url($uri, $protocol);
    }
}
if (!function_exists("current_url")) {
    /**
     * Current URL
     *
     * Returns the full URL (including segments) of the page where this
     * function is placed
     *
     * @return	string
     */
    function current_url()
    {
        $CI =& get_instance();
        return $CI->config->site_url($CI->uri->uri_string());
    }
}
if (!function_exists("uri_string")) {
    /**
     * URL String
     *
     * Returns the URI segments.
     *
     * @return	string
     */
    function uri_string()
    {
        return get_instance()->uri->uri_string();
    }
}
if (!function_exists("index_page")) {
    /**
     * Index page
     *
     * Returns the "index_page" from your config file
     *
     * @return	string
     */
    function index_page()
    {
        return get_instance()->config->item("index_page");
    }
}
if (!function_exists("anchor")) {
    /**
     * Anchor Link
     *
     * Creates an anchor based on the local URL.
     *
     * @param	string	the URL
     * @param	string	the link title
     * @param	mixed	any attributes
     * @return	string
     */
    function anchor($uri = "", $title = "", $attributes = "")
    {
        $title = (string) $title;
        $site_url = is_array($uri) ? site_url($uri) : (preg_match("#^(\\w+:)?//#i", $uri) ? $uri : site_url($uri));
        if ($title === "") {
            $title = $site_url;
        }
        if ($attributes !== "") {
            $attributes = _stringify_attributes($attributes);
        }
        return "<a href=\"" . $site_url . "\"" . $attributes . ">" . $title . "</a>";
    }
}
if (!function_exists("anchor_popup")) {
    /**
     * Anchor Link - Pop-up version
     *
     * Creates an anchor based on the local URL. The link
     * opens a new window based on the attributes specified.
     *
     * @param	string	the URL
     * @param	string	the link title
     * @param	mixed	any attributes
     * @return	string
     */
    function anchor_popup($uri = "", $title = "", $attributes = false)
    {
        $title = (string) $title;
        $site_url = preg_match("#^(\\w+:)?//#i", $uri) ? $uri : site_url($uri);
        if ($title === "") {
            $title = $site_url;
        }
        if ($attributes === false) {
            return "<a href=\"" . $site_url . "\" onclick=\"window.open('" . $site_url . "', '_blank'); return false;\">" . $title . "</a>";
        }
        if (!is_array($attributes)) {
            $attributes = array($attributes);
            $window_name = "_blank";
        } else {
            if (!empty($attributes["window_name"])) {
                $window_name = $attributes["window_name"];
                unset($attributes["window_name"]);
            } else {
                $window_name = "_blank";
            }
        }
        foreach (array("width" => "800", "height" => "600", "scrollbars" => "yes", "menubar" => "no", "status" => "yes", "resizable" => "yes", "screenx" => "0", "screeny" => "0") as $key => $val) {
            $atts[$key] = isset($attributes[$key]) ? $attributes[$key] : $val;
            unset($attributes[$key]);
        }
        $attributes = _stringify_attributes($attributes);
        return "<a href=\"" . $site_url . "\" onclick=\"window.open('" . $site_url . "', '" . $window_name . "', '" . _stringify_attributes($atts, true) . "'); return false;\"" . $attributes . ">" . $title . "</a>";
    }
}
if (!function_exists("mailto")) {
    /**
     * Mailto Link
     *
     * @param	string	the email address
     * @param	string	the link title
     * @param	mixed	any attributes
     * @return	string
     */
    function mailto($email, $title = "", $attributes = "")
    {
        $title = (string) $title;
        if ($title === "") {
            $title = $email;
        }
        return "<a href=\"mailto:" . $email . "\"" . _stringify_attributes($attributes) . ">" . $title . "</a>";
    }
}
if (!function_exists("safe_mailto")) {
    /**
     * Encoded Mailto Link
     *
     * Create a spam-protected mailto link written in Javascript
     *
     * @param	string	the email address
     * @param	string	the link title
     * @param	mixed	any attributes
     * @return	string
     */
    function safe_mailto($email, $title = "", $attributes = "")
    {
        $title = (string) $title;
        if ($title === "") {
            $title = $email;
        }
        $x = str_split("<a href=\"mailto:", 1);
        $i = 0;
        for ($l = strlen($email); $i < $l; $i++) {
            $x[] = "|" . ord($email[$i]);
        }
        $x[] = "\"";
        if ($attributes !== "") {
            if (is_array($attributes)) {
                foreach ($attributes as $key => $val) {
                    $x[] = " " . $key . "=\"";
                    $i = 0;
                    for ($l = strlen($val); $i < $l; $i++) {
                        $x[] = "|" . ord($val[$i]);
                    }
                    $x[] = "\"";
                }
            } else {
                $i = 0;
                for ($l = strlen($attributes); $i < $l; $i++) {
                    $x[] = $attributes[$i];
                }
            }
        }
        $x[] = ">";
        $temp = array();
        $i = 0;
        for ($l = strlen($title); $i < $l; $i++) {
            $ordinal = ord($title[$i]);
            if ($ordinal < 128) {
                $x[] = "|" . $ordinal;
            } else {
                if (count($temp) === 0) {
                    $count = $ordinal < 224 ? 2 : 3;
                }
                $temp[] = $ordinal;
                if (count($temp) === $count) {
                    $number = $count === 3 ? $temp[0] % 16 * 4096 + $temp[1] % 64 * 64 + $temp[2] % 64 : $temp[0] % 32 * 64 + $temp[1] % 64;
                    $x[] = "|" . $number;
                    $count = 1;
                    $temp = array();
                }
            }
        }
        $x[] = "<";
        $x[] = "/";
        $x[] = "a";
        $x[] = ">";
        $x = array_reverse($x);
        $output = "<script type=\"text/javascript\">\n" . "\t//<![CDATA[\n" . "\tvar l=new Array();\n";
        $i = 0;
        for ($c = count($x); $i < $c; $i++) {
            $output .= "\tl[" . $i . "] = '" . $x[$i] . "';\n";
        }
        $output .= "\n\tfor (var i = l.length-1; i >= 0; i=i-1) {\n" . "\t\tif (l[i].substring(0, 1) === '|') document.write(\"&#\"+unescape(l[i].substring(1))+\";\");\n" . "\t\telse document.write(unescape(l[i]));\n" . "\t}\n" . "\t//]]>\n" . "</script>";
        return $output;
    }
}
if (!function_exists("auto_link")) {
    /**
     * Auto-linker
     *
     * Automatically links URL and Email addresses.
     * Note: There's a bit of extra code here to deal with
     * URLs or emails that end in a period. We'll strip these
     * off and add them after the link.
     *
     * @param	string	the string
     * @param	string	the type: email, url, or both
     * @param	bool	whether to create pop-up links
     * @return	string
     */
    function auto_link($str, $type = "both", $popup = false)
    {
        if ($type !== "email" && preg_match_all("#(\\w*://|www\\.)[a-z0-9]+(-+[a-z0-9]+)*(\\.[a-z0-9]+(-+[a-z0-9]+)*)+(/([^\\s()<>;]+\\w)?/?)?#i", $str, $matches, PREG_OFFSET_CAPTURE | PREG_SET_ORDER)) {
            $target = $popup ? " target=\"_blank\" rel=\"noopener\"" : "";
            foreach (array_reverse($matches) as $match) {
                $a = "<a href=\"" . (strpos($match[1][0], "/") ? "" : "http://") . $match[0][0] . "\"" . $target . ">" . $match[0][0] . "</a>";
                $str = substr_replace($str, $a, $match[0][1], strlen($match[0][0]));
            }
        }
        if ($type !== "url" && preg_match_all("#([\\w\\.\\-\\+]+@[a-z0-9\\-]+\\.[a-z0-9\\-\\.]+[^[:punct:]\\s])#i", $str, $matches, PREG_OFFSET_CAPTURE)) {
            foreach (array_reverse($matches[0]) as $match) {
                if (filter_var($match[0], FILTER_VALIDATE_EMAIL) !== false) {
                    $str = substr_replace($str, safe_mailto($match[0]), $match[1], strlen($match[0]));
                }
            }
        }
        return $str;
    }
}
if (!function_exists("prep_url")) {
    /**
     * Prep URL
     *
     * Simply adds the http:// part if no scheme is included
     *
     * @param	string	the URL
     * @return	string
     */
    function prep_url($str = "")
    {
        if ($str === "") {
            return "";
        }
        $url = parse_url($str);
        if (!$url || !isset($url["scheme"])) {
            return "http://" . $str;
        }
        return $str;
    }
}
if (!function_exists("url_title")) {
    /**
     * Create URL Title
     *
     * Takes a "title" string as input and creates a
     * human-friendly URL string with a "separator" string
     * as the word separator.
     *
     * @todo	Remove old 'dash' and 'underscore' usage in 3.1+.
     * @param	string	$str		Input string
     * @param	string	$separator	Word separator
     *			(usually '-' or '_')
     * @param	bool	$lowercase	Whether to transform the output string to lowercase
     * @return	string
     */
    function url_title($str, $separator = "-", $lowercase = false)
    {
        if ($separator === "dash") {
            $separator = "-";
        } else {
            if ($separator === "underscore") {
                $separator = "_";
            }
        }
        $q_separator = preg_quote($separator, "#");
        $trans = array("&.+?;" => "", "[^\\w\\d _-]" => "", "\\s+" => $separator, "(" . $q_separator . ")+" => $separator);
        $str = strip_tags($str);
        foreach ($trans as $key => $val) {
            $str = preg_replace("#" . $key . "#i" . (UTF8_ENABLED ? "u" : ""), $val, $str);
        }
        if ($lowercase === true) {
            $str = strtolower($str);
        }
        return trim(trim($str, $separator));
    }
}
if (!function_exists("redirect")) {
    /**
     * Header Redirect
     *
     * Header redirect in two flavors
     * For very fine grained control over headers, you could use the Output
     * Library's set_header() function.
     *
     * @param	string	$uri	URL
     * @param	string	$method	Redirect method
     *			'auto', 'location' or 'refresh'
     * @param	int	$code	HTTP Response status code
     * @return	void
     */
    function redirect($uri = "", $method = "auto", $code = NULL)
    {
        if (!preg_match("#^(\\w+:)?//#i", $uri)) {
            $uri = site_url($uri);
        }
        if ($method === "auto" && isset($_SERVER["SERVER_SOFTWARE"]) && strpos($_SERVER["SERVER_SOFTWARE"], "Microsoft-IIS") !== false) {
            $method = "refresh";
        } else {
            if ($method !== "refresh" && (empty($code) || !is_numeric($code))) {
                if (isset($_SERVER["SERVER_PROTOCOL"]) && isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["SERVER_PROTOCOL"] === "HTTP/1.1") {
                    $code = $_SERVER["REQUEST_METHOD"] !== "GET" ? 303 : 307;
                } else {
                    $code = 302;
                }
            }
        }
        switch ($method) {
            case "refresh":
                header("Refresh:0;url=" . $uri);
                break;
            default:
                header("Location: " . $uri, true, $code);
                break;
        }
        exit;
    }
}

?>