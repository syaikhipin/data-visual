<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

defined("BASEPATH") or exit("No direct script access allowed");
if (!function_exists("xml_parser_create")) {
    show_error("Your PHP installation does not support XML");
}
/**
 * XML-RPC request handler class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	XML-RPC
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/libraries/xmlrpc.html
 */
class CI_Xmlrpc
{
    /**
     * Debug flag
     *
     * @var	bool
     */
    public $debug = false;
    /**
     * I4 data type
     *
     * @var	string
     */
    public $xmlrpcI4 = "i4";
    /**
     * Integer data type
     *
     * @var	string
     */
    public $xmlrpcInt = "int";
    /**
     * Boolean data type
     *
     * @var	string
     */
    public $xmlrpcBoolean = "boolean";
    /**
     * Double data type
     *
     * @var	string
     */
    public $xmlrpcDouble = "double";
    /**
     * String data type
     *
     * @var	string
     */
    public $xmlrpcString = "string";
    /**
     * DateTime format
     *
     * @var	string
     */
    public $xmlrpcDateTime = "dateTime.iso8601";
    /**
     * Base64 data type
     *
     * @var	string
     */
    public $xmlrpcBase64 = "base64";
    /**
     * Array data type
     *
     * @var	string
     */
    public $xmlrpcArray = "array";
    /**
     * Struct data type
     *
     * @var	string
     */
    public $xmlrpcStruct = "struct";
    /**
     * Data types list
     *
     * @var	array
     */
    public $xmlrpcTypes = array();
    /**
     * Valid parents list
     *
     * @var	array
     */
    public $valid_parents = array();
    /**
     * Response error numbers list
     *
     * @var	array
     */
    public $xmlrpcerr = array();
    /**
     * Response error messages list
     *
     * @var	string[]
     */
    public $xmlrpcstr = array();
    /**
     * Encoding charset
     *
     * @var	string
     */
    public $xmlrpc_defencoding = "UTF-8";
    /**
     * XML-RPC client name
     *
     * @var	string
     */
    public $xmlrpcName = "XML-RPC for CodeIgniter";
    /**
     * XML-RPC version
     *
     * @var	string
     */
    public $xmlrpcVersion = "1.1";
    /**
     * Start of user errors
     *
     * @var	int
     */
    public $xmlrpcerruser = 800;
    /**
     * Start of XML parse errors
     *
     * @var	int
     */
    public $xmlrpcerrxml = 100;
    /**
     * Backslash replacement value
     *
     * @var	string
     */
    public $xmlrpc_backslash = "";
    /**
     * XML-RPC Client object
     *
     * @var	object
     */
    public $client = NULL;
    /**
     * XML-RPC Method name
     *
     * @var	string
     */
    public $method = NULL;
    /**
     * XML-RPC Data
     *
     * @var	array
     */
    public $data = NULL;
    /**
     * XML-RPC Message
     *
     * @var	string
     */
    public $message = "";
    /**
     * Request error message
     *
     * @var	string
     */
    public $error = "";
    /**
     * XML-RPC result object
     *
     * @var	object
     */
    public $result = NULL;
    /**
     * XML-RPC Response
     *
     * @var	array
     */
    public $response = array();
    /**
     * XSS Filter flag
     *
     * @var	bool
     */
    public $xss_clean = true;
    /**
     * Constructor
     *
     * Initializes property default values
     *
     * @param	array	$config
     * @return	void
     */
    public function __construct($config = array())
    {
        $this->xmlrpc_backslash = chr(92) . chr(92);
        $this->xmlrpcTypes = array($this->xmlrpcI4 => "1", $this->xmlrpcInt => "1", $this->xmlrpcBoolean => "1", $this->xmlrpcString => "1", $this->xmlrpcDouble => "1", $this->xmlrpcDateTime => "1", $this->xmlrpcBase64 => "1", $this->xmlrpcArray => "2", $this->xmlrpcStruct => "3");
        $this->valid_parents = array("BOOLEAN" => array("VALUE"), "I4" => array("VALUE"), "INT" => array("VALUE"), "STRING" => array("VALUE"), "DOUBLE" => array("VALUE"), "DATETIME.ISO8601" => array("VALUE"), "BASE64" => array("VALUE"), "ARRAY" => array("VALUE"), "STRUCT" => array("VALUE"), "PARAM" => array("PARAMS"), "METHODNAME" => array("METHODCALL"), "PARAMS" => array("METHODCALL", "METHODRESPONSE"), "MEMBER" => array("STRUCT"), "NAME" => array("MEMBER"), "DATA" => array("ARRAY"), "FAULT" => array("METHODRESPONSE"), "VALUE" => array("MEMBER", "DATA", "PARAM", "FAULT"));
        $this->xmlrpcerr["unknown_method"] = "1";
        $this->xmlrpcstr["unknown_method"] = "This is not a known method for this XML-RPC Server";
        $this->xmlrpcerr["invalid_return"] = "2";
        $this->xmlrpcstr["invalid_return"] = "The XML data received was either invalid or not in the correct form for XML-RPC. Turn on debugging to examine the XML data further.";
        $this->xmlrpcerr["incorrect_params"] = "3";
        $this->xmlrpcstr["incorrect_params"] = "Incorrect parameters were passed to method";
        $this->xmlrpcerr["introspect_unknown"] = "4";
        $this->xmlrpcstr["introspect_unknown"] = "Cannot inspect signature for request: method unknown";
        $this->xmlrpcerr["http_error"] = "5";
        $this->xmlrpcstr["http_error"] = "Did not receive a '200 OK' response from remote server.";
        $this->xmlrpcerr["no_data"] = "6";
        $this->xmlrpcstr["no_data"] = "No data received from server.";
        $this->initialize($config);
        log_message("info", "XML-RPC Class Initialized");
    }
    /**
     * Initialize
     *
     * @param	array	$config
     * @return	void
     */
    public function initialize($config = array())
    {
        if (0 < count($config)) {
            foreach ($config as $key => $val) {
                if (isset($this->{$key})) {
                    $this->{$key} = $val;
                }
            }
        }
    }
    /**
     * Parse server URL
     *
     * @param	string	$url
     * @param	int	$port
     * @param	string	$proxy
     * @param	int	$proxy_port
     * @return	void
     */
    public function server($url, $port = 80, $proxy = false, $proxy_port = 8080)
    {
        if (stripos($url, "http") !== 0) {
            $url = "http://" . $url;
        }
        $parts = parse_url($url);
        if (isset($parts["user"]) && isset($parts["pass"])) {
            $parts["host"] = $parts["user"] . ":" . $parts["pass"] . "@" . $parts["host"];
        }
        $path = isset($parts["path"]) ? $parts["path"] : "/";
        if (!empty($parts["query"])) {
            $path .= "?" . $parts["query"];
        }
        $this->client = new XML_RPC_Client($path, $parts["host"], $port, $proxy, $proxy_port);
    }
    /**
     * Set Timeout
     *
     * @param	int	$seconds
     * @return	void
     */
    public function timeout($seconds = 5)
    {
        if ($this->client !== NULL && is_int($seconds)) {
            $this->client->timeout = $seconds;
        }
    }
    /**
     * Set Methods
     *
     * @param	string	$function	Method name
     * @return	void
     */
    public function method($function)
    {
        $this->method = $function;
    }
    /**
     * Take Array of Data and Create Objects
     *
     * @param	array	$incoming
     * @return	void
     */
    public function request($incoming)
    {
        if (!is_array($incoming)) {
            return NULL;
        }
        $this->data = array();
        foreach ($incoming as $key => $value) {
            $this->data[$key] = $this->values_parsing($value);
        }
    }
    /**
     * Set Debug
     *
     * @param	bool	$flag
     * @return	void
     */
    public function set_debug($flag = true)
    {
        $this->debug = $flag === true;
    }
    /**
     * Values Parsing
     *
     * @param	mixed	$value
     * @return	object
     */
    public function values_parsing($value)
    {
        if (is_array($value) && array_key_exists(0, $value)) {
            if (!(isset($value[1]) && isset($this->xmlrpcTypes[$value[1]]))) {
                $temp = new XML_RPC_Values($value[0], is_array($value[0]) ? "array" : "string");
            } else {
                if (is_array($value[0]) && ($value[1] === "struct" || $value[1] === "array")) {
                    foreach (array_keys($value[0]) as $k) {
                        $value[0][$k] = $this->values_parsing($value[0][$k]);
                    }
                }
                $temp = new XML_RPC_Values($value[0], $value[1]);
            }
        } else {
            $temp = new XML_RPC_Values($value, "string");
        }
        return $temp;
    }
    /**
     * Sends XML-RPC Request
     *
     * @return	bool
     */
    public function send_request()
    {
        $this->message = new XML_RPC_Message($this->method, $this->data);
        $this->message->debug = $this->debug;
        if (!($this->result = $this->client->send($this->message)) || !is_object($this->result->val)) {
            $this->error = $this->result->errstr;
            return false;
        }
        $this->response = $this->result->decode();
        return true;
    }
    /**
     * Returns Error
     *
     * @return	string
     */
    public function display_error()
    {
        return $this->error;
    }
    /**
     * Returns Remote Server Response
     *
     * @return	string
     */
    public function display_response()
    {
        return $this->response;
    }
    /**
     * Sends an Error Message for Server Request
     *
     * @param	int	$number
     * @param	string	$message
     * @return	object
     */
    public function send_error_message($number, $message)
    {
        return new XML_RPC_Response(0, $number, $message);
    }
    /**
     * Send Response for Server Request
     *
     * @param	array	$response
     * @return	object
     */
    public function send_response($response)
    {
        return new XML_RPC_Response($this->values_parsing($response));
    }
}
/**
 * XML-RPC Client class
 *
 * @category	XML-RPC
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/libraries/xmlrpc.html
 */
class XML_RPC_Client extends CI_Xmlrpc
{
    /**
     * Path
     *
     * @var	string
     */
    public $path = "";
    /**
     * Server hostname
     *
     * @var	string
     */
    public $server = "";
    /**
     * Server port
     *
     * @var	int
     */
    public $port = 80;
    /**
     *
     * Server username
     *
     * @var	string
     */
    public $username = NULL;
    /**
     * Server password
     *
     * @var	string
     */
    public $password = NULL;
    /**
     * Proxy hostname
     *
     * @var	string
     */
    public $proxy = false;
    /**
     * Proxy port
     *
     * @var	int
     */
    public $proxy_port = 8080;
    /**
     * Error number
     *
     * @var	string
     */
    public $errno = "";
    /**
     * Error message
     *
     * @var	string
     */
    public $errstring = "";
    /**
     * Timeout in seconds
     *
     * @var	int
     */
    public $timeout = 5;
    /**
     * No Multicall flag
     *
     * @var	bool
     */
    public $no_multicall = false;
    /**
     * Constructor
     *
     * @param	string	$path
     * @param	object	$server
     * @param	int	$port
     * @param	string	$proxy
     * @param	int	$proxy_port
     * @return	void
     */
    public function __construct($path, $server, $port = 80, $proxy = false, $proxy_port = 8080)
    {
        parent::__construct();
        $url = parse_url("http://" . $server);
        if (isset($url["user"]) && isset($url["pass"])) {
            $this->username = $url["user"];
            $this->password = $url["pass"];
        }
        $this->port = $port;
        $this->server = $url["host"];
        $this->path = $path;
        $this->proxy = $proxy;
        $this->proxy_port = $proxy_port;
    }
    /**
     * Send message
     *
     * @param	mixed	$msg
     * @return	object
     */
    public function send($msg)
    {
        if (is_array($msg)) {
            return new XML_RPC_Response(0, $this->xmlrpcerr["multicall_recursion"], $this->xmlrpcstr["multicall_recursion"]);
        }
        return $this->sendPayload($msg);
    }
    /**
     * Send payload
     *
     * @param	object	$msg
     * @return	object
     */
    public function sendPayload($msg)
    {
        if ($this->proxy === false) {
            $server = $this->server;
            $port = $this->port;
        } else {
            $server = $this->proxy;
            $port = $this->proxy_port;
        }
        $fp = @fsockopen($server, $port, $this->errno, $this->errstring, $this->timeout);
        if (!is_resource($fp)) {
            error_log($this->xmlrpcstr["http_error"]);
            return new XML_RPC_Response(0, $this->xmlrpcerr["http_error"], $this->xmlrpcstr["http_error"]);
        }
        if (empty($msg->payload)) {
            $msg->createPayload();
        }
        $r = "\r\n";
        $op = "POST " . $this->path . " HTTP/1.0" . $r . "Host: " . $this->server . $r . "Content-Type: text/xml" . $r . (isset($this->username) && isset($this->password) ? "Authorization: Basic " . base64_encode($this->username . ":" . $this->password) . $r : "") . "User-Agent: " . $this->xmlrpcName . $r . "Content-Length: " . strlen($msg->payload) . $r . $r . $msg->payload;
        stream_set_timeout($fp, $this->timeout);
        $written = $timestamp = 0;
        $length = strlen($op);
        while ($written < $length) {
            if (($result = fwrite($fp, substr($op, $written))) === false) {
                break;
            }
            if ($result === 0) {
                if ($timestamp === 0) {
                    $timestamp = time();
                } else {
                    if ($timestamp < time() - $this->timeout) {
                        $result = false;
                        break;
                    }
                }
            } else {
                $timestamp = 0;
            }
            $written += $result;
        }
        if ($result === false) {
            error_log($this->xmlrpcstr["http_error"]);
            return new XML_RPC_Response(0, $this->xmlrpcerr["http_error"], $this->xmlrpcstr["http_error"]);
        }
        $resp = $msg->parseResponse($fp);
        fclose($fp);
        return $resp;
    }
}
/**
 * XML-RPC Response class
 *
 * @category	XML-RPC
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/libraries/xmlrpc.html
 */
class XML_RPC_Response
{
    /**
     * Value
     *
     * @var	mixed
     */
    public $val = 0;
    /**
     * Error number
     *
     * @var	int
     */
    public $errno = 0;
    /**
     * Error message
     *
     * @var	string
     */
    public $errstr = "";
    /**
     * Headers list
     *
     * @var	array
     */
    public $headers = array();
    /**
     * XSS Filter flag
     *
     * @var	bool
     */
    public $xss_clean = true;
    /**
     * Constructor
     *
     * @param	mixed	$val
     * @param	int	$code
     * @param	string	$fstr
     * @return	void
     */
    public function __construct($val, $code = 0, $fstr = "")
    {
        if ($code !== 0) {
            $this->errno = $code;
            $this->errstr = htmlspecialchars($fstr, ENT_XML1 | ENT_NOQUOTES, "UTF-8");
        } else {
            if (!is_object($val)) {
                error_log("Invalid type '" . gettype($val) . "' (value: " . $val . ") passed to XML_RPC_Response. Defaulting to empty value.");
                $this->val = new XML_RPC_Values();
            } else {
                $this->val = $val;
            }
        }
    }
    /**
     * Fault code
     *
     * @return	int
     */
    public function faultCode()
    {
        return $this->errno;
    }
    /**
     * Fault string
     *
     * @return	string
     */
    public function faultString()
    {
        return $this->errstr;
    }
    /**
     * Value
     *
     * @return	mixed
     */
    public function value()
    {
        return $this->val;
    }
    /**
     * Prepare response
     *
     * @return	string	xml
     */
    public function prepare_response()
    {
        return "<methodResponse>\n" . ($this->errno ? "<fault>\r\n\t<value>\r\n\t\t<struct>\r\n\t\t\t<member>\r\n\t\t\t\t<name>faultCode</name>\r\n\t\t\t\t<value><int>" . $this->errno . "</int></value>\r\n\t\t\t</member>\r\n\t\t\t<member>\r\n\t\t\t\t<name>faultString</name>\r\n\t\t\t\t<value><string>" . $this->errstr . "</string></value>\r\n\t\t\t</member>\r\n\t\t</struct>\r\n\t</value>\r\n</fault>" : "<params>\n<param>\n" . $this->val->serialize_class() . "</param>\n</params>") . "\n</methodResponse>";
    }
    /**
     * Decode
     *
     * @param	mixed	$array
     * @return	array
     */
    public function decode($array = NULL)
    {
        $CI =& get_instance();
        if (is_array($array)) {
            foreach ($array as $key => &$value) {
                if (is_array($value)) {
                    $array[$key] = $this->decode($value);
                } else {
                    if ($this->xss_clean) {
                        $array[$key] = $CI->security->xss_clean($value);
                    }
                }
            }
            return $array;
        } else {
            $result = $this->xmlrpc_decoder($this->val);
            if (is_array($result)) {
                $result = $this->decode($result);
            } else {
                if ($this->xss_clean) {
                    $result = $CI->security->xss_clean($result);
                }
            }
            return $result;
        }
    }
    /**
     * XML-RPC Object to PHP Types
     *
     * @param	object
     * @return	array
     */
    public function xmlrpc_decoder($xmlrpc_val)
    {
        $kind = $xmlrpc_val->kindOf();
        if ($kind === "scalar") {
            return $xmlrpc_val->scalarval();
        }
        if ($kind === "array") {
            reset($xmlrpc_val->me);
            $b = current($xmlrpc_val->me);
            $arr = array();
            $i = 0;
            for ($size = count($b); $i < $size; $i++) {
                $arr[] = $this->xmlrpc_decoder($xmlrpc_val->me["array"][$i]);
            }
            return $arr;
        }
        if ($kind === "struct") {
            reset($xmlrpc_val->me["struct"]);
            $arr = array();
            foreach ($xmlrpc_val->me["struct"] as $key => &$value) {
                $arr[$key] = $this->xmlrpc_decoder($value);
            }
            return $arr;
        }
    }
    /**
     * ISO-8601 time to server or UTC time
     *
     * @param	string
     * @param	bool
     * @return	int	unix timestamp
     */
    public function iso8601_decode($time, $utc = false)
    {
        $t = 0;
        if (preg_match("/([0-9]{4})([0-9]{2})([0-9]{2})T([0-9]{2}):([0-9]{2}):([0-9]{2})/", $time, $regs)) {
            $fnc = $utc === true ? "gmmktime" : "mktime";
            $t = $fnc($regs[4], $regs[5], $regs[6], $regs[2], $regs[3], $regs[1]);
        }
        return $t;
    }
}
/**
 * XML-RPC Message class
 *
 * @category	XML-RPC
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/libraries/xmlrpc.html
 */
class XML_RPC_Message extends CI_Xmlrpc
{
    /**
     * Payload
     *
     * @var	string
     */
    public $payload = NULL;
    /**
     * Method name
     *
     * @var	string
     */
    public $method_name = NULL;
    /**
     * Parameter list
     *
     * @var	array
     */
    public $params = array();
    /**
     * XH?
     *
     * @var	array
     */
    public $xh = array();
    /**
     * Constructor
     *
     * @param	string	$method
     * @param	array	$pars
     * @return	void
     */
    public function __construct($method, $pars = false)
    {
        parent::__construct();
        $this->method_name = $method;
        if (is_array($pars) && 0 < count($pars)) {
            $i = 0;
            for ($c = count($pars); $i < $c; $i++) {
                $this->params[] = $pars[$i];
            }
        }
    }
    /**
     * Create Payload to Send
     *
     * @return	void
     */
    public function createPayload()
    {
        $this->payload = "<?xml version=\"1.0\"?" . ">\r\n<methodCall>\r\n" . "<methodName>" . $this->method_name . "</methodName>\r\n" . "<params>\r\n";
        $i = 0;
        for ($c = count($this->params); $i < $c; $i++) {
            $p = $this->params[$i];
            $this->payload .= "<param>\r\n" . $p->serialize_class() . "</param>\r\n";
        }
        $this->payload .= "</params>\r\n</methodCall>\r\n";
    }
    /**
     * Parse External XML-RPC Server's Response
     *
     * @param	resource
     * @return	object
     */
    public function parseResponse($fp)
    {
        $data = "";
        while ($datum = fread($fp, 4096)) {
            $data .= $datum;
        }
        if ($this->debug === true) {
            echo "<pre>---DATA---\n" . htmlspecialchars($data) . "\n---END DATA---\n\n</pre>";
        }
        if ($data === "") {
            error_log($this->xmlrpcstr["no_data"]);
            return new XML_RPC_Response(0, $this->xmlrpcerr["no_data"], $this->xmlrpcstr["no_data"]);
        }
        if (strpos($data, "HTTP") === 0 && !preg_match("/^HTTP\\/[0-9\\.]+ 200 /", $data)) {
            $errstr = substr($data, 0, strpos($data, "\n") - 1);
            return new XML_RPC_Response(0, $this->xmlrpcerr["http_error"], $this->xmlrpcstr["http_error"] . " (" . $errstr . ")");
        }
        $parser = xml_parser_create($this->xmlrpc_defencoding);
        $pname = (string) $parser;
        $this->xh[$pname] = array("isf" => 0, "ac" => "", "headers" => array(), "stack" => array(), "valuestack" => array(), "isf_reason" => 0);
        xml_set_object($parser, $this);
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, true);
        xml_set_element_handler($parser, "open_tag", "closing_tag");
        xml_set_character_data_handler($parser, "character_data");
        $lines = explode("\r\n", $data);
        while ($line = array_shift($lines)) {
            if (strlen($line) < 1) {
                break;
            }
            $this->xh[$pname]["headers"][] = $line;
        }
        $data = implode("\r\n", $lines);
        if (!xml_parse($parser, $data, count($data))) {
            $errstr = sprintf("XML error: %s at line %d", xml_error_string(xml_get_error_code($parser)), xml_get_current_line_number($parser));
            $r = new XML_RPC_Response(0, $this->xmlrpcerr["invalid_return"], $this->xmlrpcstr["invalid_return"]);
            xml_parser_free($parser);
            return $r;
        }
        xml_parser_free($parser);
        if (1 < $this->xh[$pname]["isf"]) {
            if ($this->debug === true) {
                echo "---Invalid Return---\n" . $this->xh[$pname]["isf_reason"] . "---Invalid Return---\n\n";
            }
            return new XML_RPC_Response(0, $this->xmlrpcerr["invalid_return"], $this->xmlrpcstr["invalid_return"] . " " . $this->xh[$pname]["isf_reason"]);
        }
        if (!is_object($this->xh[$pname]["value"])) {
            return new XML_RPC_Response(0, $this->xmlrpcerr["invalid_return"], $this->xmlrpcstr["invalid_return"] . " " . $this->xh[$pname]["isf_reason"]);
        }
        if ($this->debug === true) {
            echo "<pre>";
            if (count(0 < $this->xh[$pname]["headers"])) {
                echo "---HEADERS---\n";
                foreach ($this->xh[$pname]["headers"] as $header) {
                    echo $header . "\n";
                }
                echo "---END HEADERS---\n\n";
            }
            echo "---DATA---\n" . htmlspecialchars($data) . "\n---END DATA---\n\n---PARSED---\n";
            var_dump($this->xh[$pname]["value"]);
            echo "\n---END PARSED---</pre>";
        }
        $v = $this->xh[$pname]["value"];
        if ($this->xh[$pname]["isf"]) {
            $errno_v = $v->me["struct"]["faultCode"];
            $errstr_v = $v->me["struct"]["faultString"];
            $errno = $errno_v->scalarval();
            if ($errno === 0) {
                $errno = -1;
            }
            $r = new XML_RPC_Response($v, $errno, $errstr_v->scalarval());
        } else {
            $r = new XML_RPC_Response($v);
        }
        $r->headers = $this->xh[$pname]["headers"];
        return $r;
    }
    /**
     * Start Element Handler
     *
     * @param	string
     * @param	string
     * @return	void
     */
    public function open_tag($the_parser, $name)
    {
        $the_parser = (string) $the_parser;
        if (1 < $this->xh[$the_parser]["isf"]) {
            return NULL;
        }
        if (count($this->xh[$the_parser]["stack"]) === 0) {
            if ($name !== "METHODRESPONSE" && $name !== "METHODCALL") {
                $this->xh[$the_parser]["isf"] = 2;
                $this->xh[$the_parser]["isf_reason"] = "Top level XML-RPC element is missing";
                return NULL;
            }
        } else {
            if (!in_array($this->xh[$the_parser]["stack"][0], $this->valid_parents[$name], true)) {
                $this->xh[$the_parser]["isf"] = 2;
                $this->xh[$the_parser]["isf_reason"] = "XML-RPC element " . $name . " cannot be child of " . $this->xh[$the_parser]["stack"][0];
                return NULL;
            }
        }
        switch ($name) {
            case "STRUCT":
            case "ARRAY":
                $cur_val = array("value" => array(), "type" => $name);
                array_unshift($this->xh[$the_parser]["valuestack"], $cur_val);
                break;
            case "METHODNAME":
            case "NAME":
                $this->xh[$the_parser]["ac"] = "";
                break;
            case "FAULT":
                $this->xh[$the_parser]["isf"] = 1;
                break;
            case "PARAM":
                $this->xh[$the_parser]["value"] = NULL;
                break;
            case "VALUE":
                $this->xh[$the_parser]["vt"] = "value";
                $this->xh[$the_parser]["ac"] = "";
                $this->xh[$the_parser]["lv"] = 1;
                break;
            case "I4":
            case "INT":
            case "STRING":
            case "BOOLEAN":
            case "DOUBLE":
            case "DATETIME.ISO8601":
            case "BASE64":
                if ($this->xh[$the_parser]["vt"] !== "value") {
                    $this->xh[$the_parser]["isf"] = 2;
                    $this->xh[$the_parser]["isf_reason"] = "There is a " . $name . " element following a " . $this->xh[$the_parser]["vt"] . " element inside a single value";
                    return NULL;
                }
                $this->xh[$the_parser]["ac"] = "";
                break;
            case "MEMBER":
                $this->xh[$the_parser]["valuestack"][0]["name"] = "";
                $this->xh[$the_parser]["value"] = NULL;
                break;
            case "DATA":
            case "METHODCALL":
            case "METHODRESPONSE":
            case "PARAMS":
                break;
            default:
                $this->xh[$the_parser]["isf"] = 2;
                $this->xh[$the_parser]["isf_reason"] = "Invalid XML-RPC element found: " . $name;
                break;
        }
        array_unshift($this->xh[$the_parser]["stack"], $name);
        $name === "VALUE" or $this->xh[$the_parser]["lv"] = 0;
    }
    /**
     * End Element Handler
     *
     * @param	string
     * @param	string
     * @return	void
     */
    public function closing_tag($the_parser, $name)
    {
        $the_parser = (string) $the_parser;
        if (1 < $this->xh[$the_parser]["isf"]) {
            return NULL;
        }
        $curr_elem = array_shift($this->xh[$the_parser]["stack"]);
        switch ($name) {
            case "STRUCT":
            case "ARRAY":
                $cur_val = array_shift($this->xh[$the_parser]["valuestack"]);
                $this->xh[$the_parser]["value"] = isset($cur_val["values"]) ? $cur_val["values"] : array();
                $this->xh[$the_parser]["vt"] = strtolower($name);
                break;
            case "NAME":
                $this->xh[$the_parser]["valuestack"][0]["name"] = $this->xh[$the_parser]["ac"];
                break;
            case "BOOLEAN":
            case "I4":
            case "INT":
            case "STRING":
            case "DOUBLE":
            case "DATETIME.ISO8601":
            case "BASE64":
                $this->xh[$the_parser]["vt"] = strtolower($name);
                if ($name === "STRING") {
                    $this->xh[$the_parser]["value"] = $this->xh[$the_parser]["ac"];
                } else {
                    if ($name === "DATETIME.ISO8601") {
                        $this->xh[$the_parser]["vt"] = $this->xmlrpcDateTime;
                        $this->xh[$the_parser]["value"] = $this->xh[$the_parser]["ac"];
                    } else {
                        if ($name === "BASE64") {
                            $this->xh[$the_parser]["value"] = base64_decode($this->xh[$the_parser]["ac"]);
                        } else {
                            if ($name === "BOOLEAN") {
                                $this->xh[$the_parser]["value"] = (bool) $this->xh[$the_parser]["ac"];
                            } else {
                                if ($name == "DOUBLE") {
                                    $this->xh[$the_parser]["value"] = preg_match("/^[+-]?[eE0-9\\t \\.]+\$/", $this->xh[$the_parser]["ac"]) ? (double) $this->xh[$the_parser]["ac"] : "ERROR_NON_NUMERIC_FOUND";
                                } else {
                                    $this->xh[$the_parser]["value"] = preg_match("/^[+-]?[0-9\\t ]+\$/", $this->xh[$the_parser]["ac"]) ? (int) $this->xh[$the_parser]["ac"] : "ERROR_NON_NUMERIC_FOUND";
                                }
                            }
                        }
                    }
                }
                $this->xh[$the_parser]["ac"] = "";
                $this->xh[$the_parser]["lv"] = 3;
                break;
            case "VALUE":
                if ($this->xh[$the_parser]["vt"] == "value") {
                    $this->xh[$the_parser]["value"] = $this->xh[$the_parser]["ac"];
                    $this->xh[$the_parser]["vt"] = $this->xmlrpcString;
                }
                $temp = new XML_RPC_Values($this->xh[$the_parser]["value"], $this->xh[$the_parser]["vt"]);
                if (count($this->xh[$the_parser]["valuestack"]) && $this->xh[$the_parser]["valuestack"][0]["type"] === "ARRAY") {
                    $this->xh[$the_parser]["valuestack"][0]["values"][] = $temp;
                } else {
                    $this->xh[$the_parser]["value"] = $temp;
                }
                break;
            case "MEMBER":
                $this->xh[$the_parser]["ac"] = "";
                if ($this->xh[$the_parser]["value"]) {
                    $this->xh[$the_parser]["valuestack"][0]["values"][$this->xh[$the_parser]["valuestack"][0]["name"]] = $this->xh[$the_parser]["value"];
                }
                break;
            case "DATA":
                $this->xh[$the_parser]["ac"] = "";
                break;
            case "PARAM":
                if ($this->xh[$the_parser]["value"]) {
                    $this->xh[$the_parser]["params"][] = $this->xh[$the_parser]["value"];
                }
                break;
            case "METHODNAME":
                $this->xh[$the_parser]["method"] = ltrim($this->xh[$the_parser]["ac"]);
                break;
            case "PARAMS":
            case "FAULT":
            case "METHODCALL":
            case "METHORESPONSE":
                break;
            default:
                break;
        }
    }
    /**
     * Parse character data
     *
     * @param	string
     * @param	string
     * @return	void
     */
    public function character_data($the_parser, $data)
    {
        $the_parser = (string) $the_parser;
        if (1 < $this->xh[$the_parser]["isf"]) {
            return NULL;
        }
        if ($this->xh[$the_parser]["lv"] !== 3) {
            if ($this->xh[$the_parser]["lv"] === 1) {
                $this->xh[$the_parser]["lv"] = 2;
            }
            if (!isset($this->xh[$the_parser]["ac"])) {
                $this->xh[$the_parser]["ac"] = "";
            }
            $this->xh[$the_parser]["ac"] .= $data;
        }
    }
    /**
     * Add parameter
     *
     * @param	mixed
     * @return	void
     */
    public function addParam($par)
    {
        $this->params[] = $par;
    }
    /**
     * Output parameters
     *
     * @param	array	$array
     * @return	array
     */
    public function output_parameters(array $array = array())
    {
        $CI =& get_instance();
        if (!empty($array)) {
            foreach ($array as $key => &$value) {
                if (is_array($value)) {
                    $array[$key] = $this->output_parameters($value);
                } else {
                    if ($key !== "bits" && $this->xss_clean) {
                        $array[$key] = $CI->security->xss_clean($value);
                    }
                }
            }
            return $array;
        } else {
            $parameters = array();
            $i = 0;
            for ($c = count($this->params); $i < $c; $i++) {
                $a_param = $this->decode_message($this->params[$i]);
                if (is_array($a_param)) {
                    $parameters[] = $this->output_parameters($a_param);
                } else {
                    $parameters[] = $this->xss_clean ? $CI->security->xss_clean($a_param) : $a_param;
                }
            }
            return $parameters;
        }
    }
    /**
     * Decode message
     *
     * @param	object
     * @return	mixed
     */
    public function decode_message($param)
    {
        $kind = $param->kindOf();
        if ($kind === "scalar") {
            return $param->scalarval();
        }
        if ($kind === "array") {
            reset($param->me);
            $b = current($param->me);
            $arr = array();
            $i = 0;
            for ($c = count($b); $i < $c; $i++) {
                $arr[] = $this->decode_message($param->me["array"][$i]);
            }
            return $arr;
        }
        if ($kind === "struct") {
            reset($param->me["struct"]);
            $arr = array();
            foreach ($param->me["struct"] as $key => &$value) {
                $arr[$key] = $this->decode_message($value);
            }
            return $arr;
        }
    }
}
/**
 * XML-RPC Values class
 *
 * @category	XML-RPC
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/libraries/xmlrpc.html
 */
class XML_RPC_Values extends CI_Xmlrpc
{
    /**
     * Value data
     *
     * @var	array
     */
    public $me = array();
    /**
     * Value type
     *
     * @var	int
     */
    public $mytype = 0;
    /**
     * Constructor
     *
     * @param	mixed	$val
     * @param	string	$type
     * @return	void
     */
    public function __construct($val = -1, $type = "")
    {
        parent::__construct();
        if ($val !== -1 || $type !== "") {
            $type = $type === "" ? "string" : $type;
            if ($this->xmlrpcTypes[$type] == 1) {
                $this->addScalar($val, $type);
            } else {
                if ($this->xmlrpcTypes[$type] == 2) {
                    $this->addArray($val);
                } else {
                    if ($this->xmlrpcTypes[$type] == 3) {
                        $this->addStruct($val);
                    }
                }
            }
        }
    }
    /**
     * Add scalar value
     *
     * @param	scalar
     * @param	string
     * @return	int
     */
    public function addScalar($val, $type = "string")
    {
        $typeof = $this->xmlrpcTypes[$type];
        if ($this->mytype === 1) {
            echo "<strong>XML_RPC_Values</strong>: scalar can have only one value<br />";
            return 0;
        }
        if ($typeof != 1) {
            echo "<strong>XML_RPC_Values</strong>: not a scalar type (\${typeof})<br />";
            return 0;
        }
        if ($type === $this->xmlrpcBoolean) {
            $val = (int) (strcasecmp($val, "true") === 0 || $val === 1 || $val === true && strcasecmp($val, "false"));
        }
        if ($this->mytype === 2) {
            $ar = $this->me["array"];
            $ar[] = new XML_RPC_Values($val, $type);
            $this->me["array"] = $ar;
        } else {
            $this->me[$type] = $val;
            $this->mytype = $typeof;
        }
        return 1;
    }
    /**
     * Add array value
     *
     * @param	array
     * @return	int
     */
    public function addArray($vals)
    {
        if ($this->mytype !== 0) {
            echo "<strong>XML_RPC_Values</strong>: already initialized as a [" . $this->kindOf() . "]<br />";
            return 0;
        }
        $this->mytype = $this->xmlrpcTypes["array"];
        $this->me["array"] = $vals;
        return 1;
    }
    /**
     * Add struct value
     *
     * @param	object
     * @return	int
     */
    public function addStruct($vals)
    {
        if ($this->mytype !== 0) {
            echo "<strong>XML_RPC_Values</strong>: already initialized as a [" . $this->kindOf() . "]<br />";
            return 0;
        }
        $this->mytype = $this->xmlrpcTypes["struct"];
        $this->me["struct"] = $vals;
        return 1;
    }
    /**
     * Get value type
     *
     * @return	string
     */
    public function kindOf()
    {
        switch ($this->mytype) {
            case 3:
                return "struct";
            case 2:
                return "array";
            case 1:
                return "scalar";
        }
        return "undef";
    }
    /**
     * Serialize data
     *
     * @param	string
     * @param	mixed
     * @return	string
     */
    public function serializedata($typ, $val)
    {
        $rs = "";
        switch ($this->xmlrpcTypes[$typ]) {
            case 3:
                $rs .= "<struct>\n";
                reset($val);
                foreach ($val as $key2 => &$val2) {
                    $rs .= "<member>\n<name>" . $key2 . "</name>\n" . $this->serializeval($val2) . "</member>\n";
                }
                $rs .= "</struct>";
                break;
            case 2:
                $rs .= "<array>\n<data>\n";
                $i = 0;
                for ($c = count($val); $i < $c; $i++) {
                    $rs .= $this->serializeval($val[$i]);
                }
                $rs .= "</data>\n</array>\n";
                break;
            case 1:
                switch ($typ) {
                    case $this->xmlrpcBase64:
                        $rs .= "<" . $typ . ">" . base64_encode((string) $val) . "</" . $typ . ">\n";
                        break;
                    case $this->xmlrpcBoolean:
                        $rs .= "<" . $typ . ">" . ((bool) $val ? "1" : "0") . "</" . $typ . ">\n";
                        break;
                    case $this->xmlrpcString:
                        $rs .= "<" . $typ . ">" . htmlspecialchars((string) $val) . "</" . $typ . ">\n";
                        break;
                    default:
                        $rs .= "<" . $typ . ">" . $val . "</" . $typ . ">\n";
                        break;
                }
            default:
                break;
        }
    }
    /**
     * Serialize class
     *
     * @return	string
     */
    public function serialize_class()
    {
        return $this->serializeval($this);
    }
    /**
     * Serialize value
     *
     * @param	object
     * @return	string
     */
    public function serializeval($o)
    {
        $array = $o->me;
        list($value, $type) = array(reset($array), key($array));
        return "<value>\n" . $this->serializedata($type, $value) . "</value>\n";
    }
    /**
     * Scalar value
     *
     * @return	mixed
     */
    public function scalarval()
    {
        return reset($this->me);
    }
    /**
     * Encode time in ISO-8601 form.
     * Useful for sending time in XML-RPC
     *
     * @param	int	unix timestamp
     * @param	bool
     * @return	string
     */
    public function iso8601_encode($time, $utc = false)
    {
        return $utc ? strftime("%Y%m%dT%H:%i:%s", $time) : gmstrftime("%Y%m%dT%H:%i:%s", $time);
    }
}

?>