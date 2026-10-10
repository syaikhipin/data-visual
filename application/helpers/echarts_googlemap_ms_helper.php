<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}
if (!function_exists("echarts_googlemap_ms")) {
    function make_echarts_googlemap_ms($caption, $subcaption, $xAxisName, $yAxisName, $categories, $datasets)
    {
        $series = array();
        foreach ($datasets as $dataset) {
            $data = $dataset["datas"];
            $series[] = array("name" => $data[$xAxisName], "value" => $data[$yAxisName]);
        }
        return array("tooltip" => array("trigger" => "item", "formatter" => "{a} <br/>{b} : {c}"), "toolbox" => array("show" => false), "visualMap" => array(), "series" => array(array("name" => $xAxisName, "type" => "map", "mapType" => "world", "roam" => true, "data" => $series)));
    }
}

?>