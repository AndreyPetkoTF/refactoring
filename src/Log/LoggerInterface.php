<?php

namespace App\Log;

/**
 * Interface LoggerInterface
 * @package App\Log
 */
interface LoggerInterface
{
    /**
     * @param string $file
     * @param int $line
     * @param string $message
     * @return mixed
     */
    public function log(string $file, int $line, string $message);
}