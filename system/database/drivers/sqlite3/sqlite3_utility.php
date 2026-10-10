<?php

defined("BASEPATH") or exit("No direct script access allowed");
/**
 * SQLite3 Utility Class
 *
 * @category	Database
 * @author	Andrey Andreev
 * @link	https://codeigniter.com/user_guide/database/
 */
class CI_DB_sqlite3_utility extends CI_DB_utility
{
    /**
     * Export
     *
     * @param	array	$params	Preferences
     * @return	mixed
     */
    protected function _backup($params = array())
    {
        return $this->db->display_error("db_unsupported_feature");
    }
}

?>