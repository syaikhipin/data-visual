<?php

defined("BASEPATH") or exit("No direct script access.");
class AppManager extends BaseController
{
    public function index()
    {
        $this->load->library("smartyview");
        $creatorid = $this->session->userdata("login_creatorid");
        $this->smartyview->assign("apps", $this->_get_apps($creatorid));
        $this->smartyview->display("new/app.list.tpl");
    }
}

?>