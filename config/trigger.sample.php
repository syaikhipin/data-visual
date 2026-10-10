<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}
/**
 * Trigger function when user sign in DbFace successfully.
 *
 * @param $params
 *
 * @return bool
 */
function _trigger_login($params)
{
    return true;
}
/**
 * trigger function before user execute an application
 *
 * @param $params: appid, creatorid, userid
 */
function _trigger_pre_application($params)
{
    return true;
}
/**
 * trigger function after user execute an application
 *
 * @param $params: appid, creatorid, userid
 */
function _trigger_post_application($params)
{
    return false;
}

?>