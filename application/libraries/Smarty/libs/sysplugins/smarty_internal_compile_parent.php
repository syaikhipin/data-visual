<?php

/**
 * Smarty Internal Plugin Compile Parent Class
 *
 * @author Uwe Tews <uwe.tews@googlemail.com>
 */
class Smarty_Internal_Compile_Parent extends Smarty_Internal_Compile_Child
{
    /**
     * Tag name
     *
     * @var string
     */
    public $tag = "parent";
    /**
     * Block type
     *
     * @var string
     */
    public $blockType = "Parent";
}

?>