<?php

$config["production"] = true;
$config["enable_cloudcode"] = true;
$config["reserved_instance"] = true;
$config["self_host"] = true;
$config["strict_email_check"] = false;
$config["dbface_master_host"] = false;
include "config.inc.php";
if (file_exists(USERPATH . "data" . DIRECTORY_SEPARATOR . "config.php")) {
    require_once USERPATH . "data" . DIRECTORY_SEPARATOR . "config.php";
}

?>