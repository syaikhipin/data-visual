<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}
if (!function_exists("make_echarts_funnel")) {
    function make_echarts_treemap($caption, $subcaption, $xAxisName, $yAxisName, $labelname, $valuename, $datas)
    {
        $fields = array();
        $series = array();
        foreach ($datas as $data) {
            if (!$data[$labelname]) {
                $data[$labelname] = "";
            }
            $fields[] = $data[$labelname];
            $series[] = array("name" => $data[$labelname], "value" => intval($data[$valuename]));
        }
        return array("tooltip" => array("trigger" => "item", "formatter" => "{b} : {c}"), "toolbox" => array("show" => false), "calculable" => false, "series" => array(array("name" => $caption, "type" => "treemap", "itemStyle" => array("normal" => array("label" => array("show" => true, "formatter" => "{b}"), "borderWidth" => 1), "emphasis" => array("label" => array("show" => true))), "data" => $series)));
    }
}

?>