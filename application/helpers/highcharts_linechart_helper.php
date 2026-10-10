<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}
if (!function_exists("make_highcharts_linechart")) {
    function make_highcharts_linechart($caption, $subcaption, $xAxisName, $yAxisName, $labelname, $valuename, $datas)
    {
        $fields = array();
        $series = array();
        foreach ($datas as $data) {
            $fields[] = $data[$labelname];
            $series[] = floatval($data[$valuename]);
        }
        return array("title" => array("text" => NULL), "credits" => array("enabled" => false), "subtitle" => array("text" => $subcaption, "x" => -20), "tooltip" => array("valueSuffix" => ""), "xAxis" => array("categories" => $fields), "yAxis" => array("title" => array("text" => $yAxisName), "plotLines" => array(array("value" => 0, "width" => 1, "color" => "#808080"))), "legend" => array("layout" => "vertical", "align" => "center", "verticalAlign" => "bottom", "borderWidth" => 0), "series" => array(array("name" => $yAxisName, "data" => $series)));
    }
}

?>