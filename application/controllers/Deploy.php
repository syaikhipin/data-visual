<?php

defined("BASEPATH") or exit("No direct script access.");
class Deploy extends BaseController
{
    public function index()
    {
        $connid = $this->input->get("connid");
    }
}

?>