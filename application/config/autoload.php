<?php

defined("BASEPATH") or exit("No direct script access allowed");
$autoload["packages"] = array();
$autoload["libraries"] = array("database", "dbface");
$autoload["drivers"] = array("session");
$autoload["helper"] = array("dbface", "language", "dbface_log");
$autoload["config"] = array();
$autoload["language"] = array("message");
$autoload["model"] = array();

?>