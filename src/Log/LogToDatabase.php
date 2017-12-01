<?php
/**
 * Created by PhpStorm.
 * User: andreypetko
 * Date: 11/30/17
 * Time: 17:42
 */

namespace App\Log;


/**
 * Class LogToDatabase
 * @package App\Log
 */
class LogToDatabase implements LoggerInterface
{

    /**
     * @param string $file
     * @param int $line
     * @param string $message
     */
    public function log(string $file, int $line, string $message)
    {
        // TODO: Implement log() method.
    }
}