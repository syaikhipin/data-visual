<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}
if (!function_exists("make_echarts_barchart_ms")) {
    function make_echarts_barchart_ms($caption, $subcaption, $xAxisName, $yAxisName, $categories, $datasets)
    {
        $serieses = array();
        $legends = array();
        foreach ($datasets as $dataset) {
            $legends[] = $dataset["seriesName"];
            $series = array("name" => $dataset["seriesName"], "type" => "bar", "data" => $dataset["datas"]);
            $serieses[] = $series;
        }
        return array("tooltip" => array("trigger" => "axis"), "legend" => array("data" => $legends, "x" => "center", "y" => "bottom"), "toolbox" => array("show" => false), "calculable" => false, "yAxis" => array("type" => "category", "data" => $categories), "xAxis" => array(array("type" => "value", "axisLabel" => array("formatter" => "{value}"))), "series" => $serieses);
    }
}

?>