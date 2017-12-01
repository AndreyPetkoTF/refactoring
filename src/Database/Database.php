<?php

namespace App\Database;

use App\Service\ConfigService;

/**
 * Class Database
 * @package App
 */
class Database implements DatabaseInterface
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $login;
    /**
     * @var string
     */
    private $password;

    /**
     * Database constructor.
     * @param ConfigService $configService
     */
    public function __construct(ConfigService $configService)
    {
        $this->name = $configService->getConfig('db', 'name');
        $this->login = $configService->getConfig('db', 'login');
        $this->password = $configService->getConfig('db', 'password');
    }

    /**
     * @return bool|string
     */
    public function read()
    {
        return file_get_contents($this->name);
    }

    /**
     * @param $content
     * @return bool
     */
    public function write($content): bool
    {
        return (bool)file_put_contents($this->name, $content, FILE_APPEND);
    }
}