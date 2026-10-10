<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}
if (!function_exists("make_highcharts_areachart")) {
    function make_highcharts_areachart($caption, $subcaption, $xAxisName, $yAxisName, $labelname, $valuename, $datas)
    {
        $fields = array();
        $series = array();
        foreach ($datas as $data) {
            $fields[] = $data[$labelname];
            $series[] = floatval($data[$valuename]);
        }
        return array("chart" => array("type" => "area"), "title" => array("text" => empty($subcaption) ? $caption : $subcaption, "x" => "center"), "credits" => array("enabled" => false), "subtitle" => array("text" => $subcaption, "x" => -20), "tooltip" => array("valueSuffix" => ""), "xAxis" => array("categories" => $fields), "yAxis" => array("title" => array("text" => $yAxisName)), "legend" => array("layout" => "vertical", "align" => "center", "verticalAlign" => "bottom", "borderWidth" => 0), "series" => array(array("name" => $yAxisName, "data" => $series)));
    }
}

?>