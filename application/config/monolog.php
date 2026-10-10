<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}
$config["handlers"] = array("file");
$config["channel"] = "app";
$config["threshold"] = "2";
$config["introspection_processor"] = false;
$config["max_logfiles"] = 30;
$config["file_logfile"] = USERPATH . "logs/log.log";
$config["exclusion_list"] = array();

?>