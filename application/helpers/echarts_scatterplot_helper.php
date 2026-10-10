<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}
if (!function_exists("make_echarts_scatterplot")) {
    function make_echarts_scatterplot($caption, $subcaption, $xAxisName, $yAxisName, $labelname, $valuename, $datas)
    {
        $fields = array();
        $series = array();
        foreach ($datas as $data) {
            $fields[] = $data[$labelname];
            $series[] = array($data[$labelname], $data[$valuename]);
        }
        return array("tooltip" => array("trigger" => "item"), "toolbox" => array("show" => false), "calculable" => false, "xAxis" => array(array("type" => "category", "data" => $fields, "boundaryGap" => false)), "yAxis" => array(array("type" => "value", "axisLabel" => array("formatter" => "{value}"))), "series" => array(array("name" => $yAxisName, "type" => "scatter", "symbolSize" => 5, "data" => $series)));
    }
}

?>