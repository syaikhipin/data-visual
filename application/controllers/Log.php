<?php

defined("BASEPATH") or exit("No direct script access.");
class Log extends BaseController
{
    public function index()
    {
        $this->load->library("smartyview");
        $this->smartyview->display("log/log.index.tpl");
    }
}

?>