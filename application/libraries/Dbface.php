<?php

defined("BASEPATH") or exit("No direct script access allowed");
/**
 * Created by PhpStorm.
 * User: ding
 * Date: 2018/10/10
 * Time: 下午1:31
 */
class Dbface
{
    public function __construct(array $config = array())
    {
    }
    /**
     * get native database connection object by key
     *
     * @param $key
     */
    public function get_db($key)
    {
    }
    /**
     * get native database connection object for warehouse
     * @return null
     */
    public function get_warehouse()
    {
    }
}

?>