<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

defined("BASEPATH") or exit("No direct script access allowed");
/**
 * HTML Table Generating Class
 *
 * Lets you create tables manually or from database result objects, or arrays.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	HTML Tables
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/libraries/table.html
 */
class CI_Table
{
    /**
     * Data for table rows
     *
     * @var array
     */
    public $rows = array();
    /**
     * Data for table heading
     *
     * @var array
     */
    public $heading = array();
    /**
     * Whether or not to automatically create the table header
     *
     * @var bool
     */
    public $auto_heading = true;
    /**
     * Table caption
     *
     * @var string
     */
    public $caption = NULL;
    /**
     * Table layout template
     *
     * @var array
     */
    public $template = NULL;
    /**
     * Newline setting
     *
     * @var string
     */
    public $newline = "\n";
    /**
     * Contents of empty cells
     *
     * @var string
     */
    public $empty_cells = "";
    /**
     * Callback for custom table layout
     *
     * @var function
     */
    public $function = NULL;
    /**
     * Set the template from the table config file if it exists
     *
     * @param	array	$config	(default: array())
     * @return	void
     */
    public function __construct($config = array())
    {
        foreach ($config as $key => $val) {
            $this->template[$key] = $val;
        }
        log_message("info", "Table Class Initialized");
    }
    /**
     * Set the template
     *
     * @param	array	$template
     * @return	bool
     */
    public function set_template($template)
    {
        if (!is_array($template)) {
            return false;
        }
        $this->template = $template;
        return true;
    }
    /**
     * Set the table heading
     *
     * Can be passed as an array or discreet params
     *
     * @param	mixed
     * @return	CI_Table
     */
    public function set_heading($args = array())
    {
        $this->heading = $this->_prep_args(func_get_args());
        return $this;
    }
    /**
     * Set columns. Takes a one-dimensional array as input and creates
     * a multi-dimensional array with a depth equal to the number of
     * columns. This allows a single array with many elements to be
     * displayed in a table that has a fixed column count.
     *
     * @param	array	$array
     * @param	int	$col_limit
     * @return	array
     */
    public function make_columns($array = array(), $col_limit = 0)
    {
        if (!is_array($array) || count($array) === 0 || !is_int($col_limit)) {
            return false;
        }
        $this->auto_heading = false;
        if ($col_limit === 0) {
            return $array;
        }
        $new = array();
        do {
            $temp = array_splice($array, 0, $col_limit);
            if (count($temp) < $col_limit) {
                for ($i = count($temp); $i < $col_limit; $i++) {
                    $temp[] = "&nbsp;";
                }
            }
            $new[] = $temp;
        } while (0 < count($array));
        return $new;
    }
    /**
     * Set "empty" cells
     *
     * Can be passed as an array or discreet params
     *
     * @param	mixed	$value
     * @return	CI_Table
     */
    public function set_empty($value)
    {
        $this->empty_cells = $value;
        return $this;
    }
    /**
     * Add a table row
     *
     * Can be passed as an array or discreet params
     *
     * @param	mixed
     * @return	CI_Table
     */
    public function add_row($args = array())
    {
        $this->rows[] = $this->_prep_args(func_get_args());
        return $this;
    }
    /**
     * Prep Args
     *
     * Ensures a standard associative array format for all cell data
     *
     * @param	array
     * @return	array
     */
    protected function _prep_args($args)
    {
        if (isset($args[0]) && count($args) === 1 && is_array($args[0]) && !isset($args[0]["data"])) {
            $args = $args[0];
        }
        foreach ($args as $key => $val) {
            is_array($val) or $args[$key] = array("data" => $val);
        }
        return $args;
    }
    /**
     * Add a table caption
     *
     * @param	string	$caption
     * @return	CI_Table
     */
    public function set_caption($caption)
    {
        $this->caption = $caption;
        return $this;
    }
    /**
     * Generate the table
     *
     * @param	mixed	$table_data
     * @return	string
     */
    public function generate($table_data = NULL)
    {
        if (!empty($table_data)) {
            if ($table_data instanceof CI_DB_result) {
                $this->_set_from_db_result($table_data);
            } else {
                if (is_array($table_data)) {
                    $this->_set_from_array($table_data);
                }
            }
        }
        if (empty($this->heading) && empty($this->rows)) {
            return "Undefined table data";
        }
        $this->_compile_template();
        if (isset($this->function) && !is_callable($this->function)) {
            $this->function = NULL;
        }
        $out = $this->template["table_open"] . $this->newline;
        if ($this->caption) {
            $out .= "<caption>" . $this->caption . "</caption>" . $this->newline;
        }
        if (!empty($this->heading)) {
            $out .= $this->template["thead_open"] . $this->newline . $this->template["heading_row_start"] . $this->newline;
            foreach ($this->heading as $heading) {
                $temp = $this->template["heading_cell_start"];
                foreach ($heading as $key => $val) {
                    if ($key !== "data") {
                        $temp = str_replace("<th", "<th " . $key . "=\"" . $val . "\"", $temp);
                    }
                }
                $out .= $temp . (isset($heading["data"]) ? $heading["data"] : "") . $this->template["heading_cell_end"];
            }
            $out .= $this->template["heading_row_end"] . $this->newline . $this->template["thead_close"] . $this->newline;
        }
        if (!empty($this->rows)) {
            $out .= $this->template["tbody_open"] . $this->newline;
            $i = 1;
            foreach ($this->rows as $row) {
                if (!is_array($row)) {
                    break;
                }
                $name = fmod($i++, 2) ? "" : "alt_";
                $out .= $this->template["row_" . $name . "start"] . $this->newline;
                foreach ($row as $cell) {
                    $temp = $this->template["cell_" . $name . "start"];
                    foreach ($cell as $key => $val) {
                        if ($key !== "data") {
                            $temp = str_replace("<td", "<td " . $key . "=\"" . $val . "\"", $temp);
                        }
                    }
                    $cell = isset($cell["data"]) ? $cell["data"] : "";
                    $out .= $temp;
                    if ($cell === "" || $cell === NULL) {
                        $out .= $this->empty_cells;
                    } else {
                        if (isset($this->function)) {
                            $out .= call_user_func($this->function, $cell);
                        } else {
                            $out .= $cell;
                        }
                    }
                    $out .= $this->template["cell_" . $name . "end"];
                }
                $out .= $this->template["row_" . $name . "end"] . $this->newline;
            }
            $out .= $this->template["tbody_close"] . $this->newline;
        }
        $out .= $this->template["table_close"];
        $this->clear();
        return $out;
    }
    /**
     * Clears the table arrays.  Useful if multiple tables are being generated
     *
     * @return	CI_Table
     */
    public function clear()
    {
        $this->rows = array();
        $this->heading = array();
        $this->auto_heading = true;
        $this->caption = NULL;
        return $this;
    }
    /**
     * Set table data from a database result object
     *
     * @param	CI_DB_result	$object	Database result object
     * @return	void
     */
    protected function _set_from_db_result($object)
    {
        if ($this->auto_heading === true && empty($this->heading)) {
            $this->heading = $this->_prep_args($object->list_fields());
        }
        foreach ($object->result_array() as $row) {
            $this->rows[] = $this->_prep_args($row);
        }
    }
    /**
     * Set table data from an array
     *
     * @param	array	$data
     * @return	void
     */
    protected function _set_from_array($data)
    {
        if ($this->auto_heading === true && empty($this->heading)) {
            $this->heading = $this->_prep_args(array_shift($data));
        }
        foreach ($data as &$row) {
            $this->rows[] = $this->_prep_args($row);
        }
    }
    /**
     * Compile Template
     *
     * @return	void
     */
    protected function _compile_template()
    {
        if ($this->template === NULL) {
            $this->template = $this->_default_template();
        } else {
            $this->temp = $this->_default_template();
            foreach (array("table_open", "thead_open", "thead_close", "heading_row_start", "heading_row_end", "heading_cell_start", "heading_cell_end", "tbody_open", "tbody_close", "row_start", "row_end", "cell_start", "cell_end", "row_alt_start", "row_alt_end", "cell_alt_start", "cell_alt_end", "table_close") as $val) {
                if (!isset($this->template[$val])) {
                    $this->template[$val] = $this->temp[$val];
                }
            }
        }
    }
    /**
     * Default Template
     *
     * @return	array
     */
    protected function _default_template()
    {
        return array("table_open" => "<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\">", "thead_open" => "<thead>", "thead_close" => "</thead>", "heading_row_start" => "<tr>", "heading_row_end" => "</tr>", "heading_cell_start" => "<th>", "heading_cell_end" => "</th>", "tbody_open" => "<tbody>", "tbody_close" => "</tbody>", "row_start" => "<tr>", "row_end" => "</tr>", "cell_start" => "<td>", "cell_end" => "</td>", "row_alt_start" => "<tr>", "row_alt_end" => "</tr>", "cell_alt_start" => "<td>", "cell_alt_end" => "</td>", "table_close" => "</table>");
    }
}

?>