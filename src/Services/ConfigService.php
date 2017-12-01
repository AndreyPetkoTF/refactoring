<?php

namespace App\Service;

use App\Exception\WrongConfigKeyException;

/**
 * Class ConfigService
 * @package App\Service
 */
class ConfigService
{

    private const configPath = __DIR__ . '/../../config.ini';
    /**
     * @var
     */
    private $config;

    /**
     * ConfigService constructor.
     */
    public function __construct()
    {
        $this->parseConfigFile();
    }

    private function parseConfigFile(): void
    {
        $this->config = parse_ini_file(self::configPath, true);
    }

    /**
     * @param string $block
     * @param string $key
     * @return string
     * @throws WrongConfigKeyException
     */
    public function getConfig(string $block, string $key): string
    {
        if(!isset($this->config[$block][$key])) {
            throw new WrongConfigKeyException($block . ', ' . $key);
        }

        return $this->config[$block][$key];
    }

    /**
     * @return string
     */
    function __toString()
    {
        return json_encode($this->config);
    }
}