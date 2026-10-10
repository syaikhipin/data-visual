<?php

class Settings
{
    public $username = "";
    public $settings = "";
    public function __construct()
    {
    }
    public function Save()
    {
        if (!file_exists(DATA . "/" . $_SESSION["userid"] . "/settings.php")) {
            saveJSON("settings.php", array($this->username => array("codiad.username" => $this->username)), $_SESSION["userid"]);
        }
        $settings = getJSON("settings.php");
        $this->settings["username"] = $this->username;
        $settings[$this->username] = $this->settings;
        saveJSON("settings.php", $settings, $_SESSION["userid"]);
        echo formatJSEND("success", NULL);
    }
    public function Load()
    {
        if (!file_exists(DATA . "/" . $_SESSION["userid"] . "/settings.php")) {
            saveJSON("settings.php", array($this->username => array("codiad.username" => $this->username)), $_SESSION["userid"]);
        }
        $settings = getJSON("settings.php");
        echo formatJSEND("success", $settings[$this->username]);
    }
}

?>