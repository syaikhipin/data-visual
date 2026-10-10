<?php

defined("BASEPATH") or exit("No direct script access.");
class Duplicatetable extends BaseController
{
    public function doduplicate()
    {
        if (!$this->_is_admin()) {
            exit;
        }
        $tablename = $this->input->get_post("tblname");
        $duprecord = $this->input->get_post("duprecord");
        $orgtable = $this->input->get_post("orgtable");
        $dbid = $this->input->post("connid");
        $creatorid = $this->session->userdata("login_creatorid");
        $db = $this->_get_db($creatorid, $dbid);
        $flag = false;
        if ($duprecord == 1) {
            $flag = $db->query("create table `" . $tablename . "` select * from `" . $orgtable . "`");
        } else {
            $flag = $db->query("create table `" . $tablename . "` like `" . $orgtable . "`");
        }
        echo json_encode(array("flag" => $flag));
    }
}

?>