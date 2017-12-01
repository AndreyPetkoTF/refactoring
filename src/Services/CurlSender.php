<?php

namespace App\Service;


/**
 * Class CurlSender
 * @package App
 */
class CurlSender
{
    /**
     * @param string $url
     * @return mixed
     */
    public function getContentByUrl(string $url)
    {
        $CH = curl_init($url);
        curl_setopt($CH, CURLOPT_RETURNTRANSFER, true);
        $content = curl_exec($CH);
        curl_close($CH);

        return $content;
    }
}