<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}
if (!function_exists("make_echarts_line2d")) {
    function make_echarts_linechart($caption, $subcaption, $xAxisName, $yAxisName, $labelname, $valuename, $datas)
    {
        $fields = array();
        $series = array();
        foreach ($datas as $data) {
            $fields[] = $data[$labelname];
            $series[] = $data[$valuename];
        }
        return array("tooltip" => array("trigger" => "axis"), "toolbox" => array("show" => false), "calculable" => false, "xAxis" => array(array("type" => "category", "data" => $fields, "boundaryGap" => false)), "yAxis" => array(array("type" => "value", "axisLabel" => array("formatter" => "{value}"))), "series" => array(array("name" => $yAxisName, "type" => "line", "smooth" => false, "symbol" => "circle", "data" => $series)));
    }
}

?>