<?php

/**
 * 生成leaflet报表，
 *
 * 匹配规则:
 *
 * 1). Field有明确的map_address字段
 * 2). 匹配有ip字段
 *
 * Key Metrics: 检测其他数字字段, 以Label的形式显示
 *
 * @param $fields
 *
 * @return mixed
 */
function insights_googlemap_details($db, $table, $fields)
{
    return false;
}

?>