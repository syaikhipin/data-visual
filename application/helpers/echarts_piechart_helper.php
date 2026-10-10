<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}
if (!function_exists("make_echarts_piechart")) {
    function make_echarts_piechart($caption, $subcaption, $xAxisName, $yAxisName, $labelname, $valuename, $datas)
    {
        $fields = array();
        $series = array();
        foreach ($datas as $data) {
            $fields[] = $data[$labelname];
            $series[] = array("name" => $data[$labelname], "value" => $data[$valuename]);
        }
        return array("tooltip" => array("trigger" => "item", "formatter" => "{a} <br/>{b} : {c} ({d}%)"), "toolbox" => array("show" => false), "calculable" => false, "series" => array(array("name" => $yAxisName, "type" => "pie", "radius" => "55%", "cursor" => "default", "selectedMode" => "single", "center" => array("50%", "60%"), "data" => $series)));
    }
}

?>