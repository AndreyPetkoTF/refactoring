<?php

namespace App\Exception;

/**
 * Class WrongConfigKeyException
 * @package App\Exception
 */
class WrongConfigKeyException extends \Exception
{
    /**
     * WrongConfigKeyException constructor.
     * @param string $blockAndKey
     */
    public function __construct(string $blockAndKey)
    {
        $this->message = "Not available key and block in config file {$blockAndKey}";
    }
}