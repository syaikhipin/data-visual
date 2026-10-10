<?php

defined("BASEPATH") or exit("No direct script access.");
class Form extends BaseController
{
    public function create()
    {
        $this->load->library("smartyview");
        $creatorid = $this->session->userdata("login_creatorid");
        $this->smartyview->assign("conns", $this->_get_connections($creatorid));
        $this->smartyview->display("new/form.create.tpl");
    }
}

?>