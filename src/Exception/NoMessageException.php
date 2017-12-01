<?php

namespace App\Exception;

/**
 * Class NoMessageException
 * @package App
 */
class NoMessageException extends \Exception
{
    /**
     * NoMessageException constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->message = "Message not defined for value {$value}";
    }
}