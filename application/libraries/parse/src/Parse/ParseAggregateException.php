<?php

namespace Parse;

/**
 * Class ParseAggregateException - Multiple error condition.
 *
 * @author Fosco Marotto <fjm@fb.com>
 * @package Parse
 */
class ParseAggregateException extends ParseException
{
    /**
     * Collection of error values
     *
     * @var array
     */
    private $errors = NULL;
    /**
     * Constructs a Parse\ParseAggregateException.
     *
     * @param string     $message  Message for the Exception.
     * @param array      $errors   Collection of error values.
     * @param \Exception $previous Previous exception.
     */
    public function __construct($message, $errors = array(), $previous = NULL)
    {
        parent::__construct($message, 600, $previous);
        $this->errors = $errors;
    }
    /**
     * Return the aggregated errors that were thrown.
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}

?>