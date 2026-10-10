<?php

defined("BASEPATH") or exit("No direct script access.");
class InternalRedirect extends CI_Controller
{
    public function index()
    {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: https://www.dbface.com");
    }
}

?>