<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

defined("BASEPATH") or exit("No direct script access allowed");
/**
 * PDO ODBC Database Adapter Class
 *
 * Note: _DB is an extender class that the app controller
 * creates dynamically based on whether the query builder
 * class is being used or not.
 *
 * @package		CodeIgniter
 * @subpackage	Drivers
 * @category	Database
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/database/
 */
class CI_DB_pdo_odbc_driver extends CI_DB_pdo_driver
{
    /**
     * Sub-driver
     *
     * @var	string
     */
    public $subdriver = "odbc";
    /**
     * Database schema
     *
     * @var	string
     */
    public $schema = "public";
    /**
     * Identifier escape character
     *
     * Must be empty for ODBC.
     *
     * @var	string
     */
    protected $_escape_char = "";
    /**
     * ESCAPE statement string
     *
     * @var	string
     */
    protected $_like_escape_str = " {escape '%s'} ";
    /**
     * ORDER BY random keyword
     *
     * @var	array
     */
    protected $_random_keyword = array("RND()", "RND(%d)");
    /**
     * Class constructor
     *
     * Builds the DSN if not already set.
     *
     * @param	array	$params
     * @return	void
     */
    public function __construct($params)
    {
        parent::__construct($params);
        if (empty($this->dsn)) {
            $this->dsn = "odbc:";
            if (empty($this->hostname) && empty($this->HOSTNAME) && empty($this->port) && empty($this->PORT)) {
                if (isset($this->DSN)) {
                    $this->dsn .= "DSN=" . $this->DSN;
                } else {
                    if (!empty($this->database)) {
                        $this->dsn .= "DSN=" . $this->database;
                    }
                }
                return NULL;
            }
            $this->dsn .= "DRIVER=" . (isset($this->DRIVER) ? "{" . $this->DRIVER . "}" : "{IBM DB2 ODBC DRIVER}") . ";";
            if (isset($this->DATABASE)) {
                $this->dsn .= "DATABASE=" . $this->DATABASE . ";";
            } else {
                if (!empty($this->database)) {
                    $this->dsn .= "DATABASE=" . $this->database . ";";
                }
            }
            if (isset($this->HOSTNAME)) {
                $this->dsn .= "HOSTNAME=" . $this->HOSTNAME . ";";
            } else {
                $this->dsn .= "HOSTNAME=" . (empty($this->hostname) ? "127.0.0.1;" : $this->hostname . ";");
            }
            if (isset($this->PORT)) {
                $this->dsn .= "PORT=" . $this->port . ";";
            } else {
                if (!empty($this->port)) {
                    $this->dsn .= ";PORT=" . $this->port . ";";
                }
            }
            $this->dsn .= "PROTOCOL=" . (isset($this->PROTOCOL) ? $this->PROTOCOL . ";" : "TCPIP;");
        }
    }
    /**
     * Platform-dependant string escape
     *
     * @param	string
     * @return	string
     */
    protected function _escape_str($str)
    {
        $this->db->display_error("db_unsupported_feature");
    }
    /**
     * Determines if a query is a "write" type.
     *
     * @param	string	An SQL query string
     * @return	bool
     */
    public function is_write_type($sql)
    {
        if (preg_match("#^(INSERT|UPDATE).*RETURNING\\s.+(\\,\\s?.+)*\$#i", $sql)) {
            return false;
        }
        return parent::is_write_type($sql);
    }
    /**
     * Show table query
     *
     * Generates a platform-specific query string so that the table names can be fetched
     *
     * @param	bool	$prefix_limit
     * @return	string
     */
    protected function _list_tables($prefix_limit = false)
    {
        $sql = "SELECT table_name FROM information_schema.tables WHERE table_schema = '" . $this->schema . "'";
        if ($prefix_limit !== false && $this->dbprefix !== "") {
            return $sql . " AND table_name LIKE '" . $this->escape_like_str($this->dbprefix) . "%' " . sprintf($this->_like_escape_str, $this->_like_escape_chr);
        }
        return $sql;
    }
    /**
     * Show column query
     *
     * Generates a platform-specific query string so that the column names can be fetched
     *
     * @param	string	$table
     * @return	string
     */
    protected function _list_columns($table = "")
    {
        return "SELECT column_name FROM information_schema.columns WHERE table_name = " . $this->escape($table);
    }
}

?>