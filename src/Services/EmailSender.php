<?php

namespace App\Service;


/**
 * Class EmailSender
 * @package App
 */
class EmailSender
{
    /**
     * @param string $to
     * @param string $from
     * @param string $body
     */
    public function sendEmail(string $to, string $from, string $body): void
    {
        printf("Email has been send to %s From %s.\r\n\r\n Notify you about %s", $to, $from, $body);
    }
}