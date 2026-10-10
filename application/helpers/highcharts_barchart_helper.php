<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}
if (!function_exists("make_highcharts_barchart")) {
    function make_highcharts_barchart($caption, $subcaption, $xAxisName, $yAxisName, $labelname, $valuename, $datas)
    {
        $fields = array();
        $series = array();
        foreach ($datas as $data) {
            $fields[] = $data[$labelname];
            $series[] = floatval($data[$valuename]);
        }
        return array("chart" => array("type" => "bar"), "title" => array("text" => $caption, "x" => -20), "credits" => array("enabled" => false), "subtitle" => array("text" => $subcaption, "x" => -20), "tooltip" => array("valueSuffix" => ""), "xAxis" => array("categories" => $fields), "yAxis" => array("title" => array("text" => $yAxisName)), "plotOptions" => array("bar" => array("dataLabels" => array("enabled" => true))), "legend" => array("layout" => "vertical", "align" => "center", "verticalAlign" => "bottom", "borderWidth" => 0), "series" => array(array("name" => $yAxisName, "data" => $series)));
    }
}

?>