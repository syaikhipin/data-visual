<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}
if (!function_exists("make_echarts_barchart")) {
    function make_echarts_barchart($caption, $subcaption, $xAxisName, $yAxisName, $labelname, $valuename, $datas)
    {
        $fields = array();
        $series = array();
        foreach ($datas as $data) {
            $fields[] = $data[$labelname];
            $series[] = $data[$valuename];
        }
        return array("tooltip" => array("trigger" => "axis"), "toolbox" => array("show" => false), "calculable" => false, "yAxis" => array("type" => "category", "data" => $fields), "xAxis" => array(array("type" => "value", "axisLabel" => array("formatter" => "{value}"))), "series" => array(array("name" => $yAxisName, "type" => "bar", "data" => $series)));
    }
}

?>