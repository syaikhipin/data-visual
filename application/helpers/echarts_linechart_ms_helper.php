<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}
if (!function_exists("make_echarts_linechart_ms")) {
    function make_echarts_linechart_ms($caption, $subcaption, $xAxisName, $yAxisName, $categories, $datasets)
    {
        $serieses = array();
        $legends = array();
        foreach ($datasets as $dataset) {
            $legends[] = $dataset["seriesName"];
            $series = array("name" => $dataset["seriesName"], "type" => "line", "smooth" => false, "symbol" => "circle", "data" => $dataset["datas"]);
            $serieses[] = $series;
        }
        return array("tooltip" => array("trigger" => "axis"), "legend" => array("data" => $legends, "x" => "center", "y" => "bottom"), "toolbox" => array("show" => false), "calculable" => false, "xAxis" => array(array("type" => "category", "data" => $categories, "boundaryGap" => false)), "yAxis" => array(array("type" => "value", "axisLabel" => array("formatter" => "{value}"))), "series" => $serieses);
    }
}

?>