<?php

/**
 * Smarty Internal Plugin Compile Block Parent Class
 *
 * @author Uwe Tews <uwe.tews@googlemail.com>
 */
class Smarty_Internal_Compile_Block_Parent extends Smarty_Internal_Compile_Child
{
    /**
     * Tag name
     *
     * @var string
     */
    public $tag = "block_parent";
    /**
     * Block type
     *
     * @var string
     */
    public $blockType = "Parent";
}

?>