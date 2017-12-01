<?php

namespace App\Database;

/**
 * Interface DatabaseInterface
 * @package App
 */
interface DatabaseInterface
{
    /**
     * @return mixed
     */
    public function read();

    /**
     * @param $content
     * @return mixed
     */
    public function write($content): bool;
}
