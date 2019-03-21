<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

defined("BASEPATH") or exit("No direct script access allowed");
/**
 * PDO SQLite Database Adapter Class
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
class CI_DB_pdo_sqlite_driver extends CI_DB_pdo_driver
{
    /**
     * Sub-driver
     *
     * @var	string
     */
    public $subdriver = "sqlite";
    /**
     * ORDER BY random keyword
     *
     * @var	array
     */
    protected $_random_keyword = " RANDOM()";
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
            $this->dsn = "sqlite:";
            if (empty($this->database) && empty($this->hostname)) {
                $this->database = ":memory:";
            }
            $this->database = empty($this->database) ? $this->hostname : $this->database;
        }
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
        $sql = "SELECT \"NAME\" FROM \"SQLITE_MASTER\" WHERE \"TYPE\" = 'table'";
        if ($prefix_limit === true && $this->dbprefix !== "") {
            return $sql . " AND \"NAME\" LIKE '" . $this->escape_like_str($this->dbprefix) . "%' " . sprintf($this->_like_escape_str, $this->_like_escape_chr);
        }
        return $sql;
    }
    /**
     * Fetch Field Names
     *
     * @param	string	$table	Table name
     * @return	array
     */
    public function list_fields($table)
    {
        if (isset($this->data_cache["field_names"][$table])) {
            return $this->data_cache["field_names"][$table];
        }
        if (($result = $this->query("PRAGMA TABLE_INFO(" . $this->protect_identifiers($table, true, NULL, false) . ")")) === false) {
            return false;
        }
        $this->data_cache["field_names"][$table] = array();
        foreach ($result->result_array() as $row) {
            $this->data_cache["field_names"][$table][] = $row["name"];
        }
        return $this->data_cache["field_names"][$table];
    }
    /**
     * Returns an object with field data
     *
     * @param	string	$table
     * @return	array
     */
    public function field_data($table)
    {
        if (($query = $this->query("PRAGMA TABLE_INFO(" . $this->protect_identifiers($table, true, NULL, false) . ")")) === false) {
            return false;
        }
        $query = $query->result_array();
        if (empty($query)) {
            return false;
        }
        $retval = array();
        $i = 0;
        for ($c = count($query); $i < $c; $i++) {
            $retval[$i] = new stdClass();
            $retval[$i]->name = $query[$i]["name"];
            $retval[$i]->type = $query[$i]["type"];
            $retval[$i]->max_length = NULL;
            $retval[$i]->default = $query[$i]["dflt_value"];
            $retval[$i]->primary_key = isset($query[$i]["pk"]) ? (int) $query[$i]["pk"] : 0;
        }
        return $retval;
    }
    /**
     * Replace statement
     *
     * @param	string	$table	Table name
     * @param	array	$keys	INSERT keys
     * @param	array	$values	INSERT values
     * @return 	string
     */
    protected function _replace($table, $keys, $values)
    {
        return "INSERT OR " . parent::_replace($table, $keys, $values);
    }
    /**
     * Truncate statement
     *
     * Generates a platform-specific truncate string from the supplied data
     *
     * If the database does not support the TRUNCATE statement,
     * then this method maps to 'DELETE FROM table'
     *
     * @param	string	$table
     * @return	string
     */
    protected function _truncate($table)
    {
        return "DELETE FROM " . $table;
    }
}

?>