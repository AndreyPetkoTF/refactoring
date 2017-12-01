<?php

namespace App\Log;

use App\Service\ConfigService;

class LogToFile implements LoggerInterface
{
    /**
     * @var ConfigService
     */
    private $configService;

    public function __construct(ConfigService $configService)
    {
        $this->configService = $configService;
    }

    public function log(string $file, int $line, string $data)
    {
        $message = $this->generateLogMessage($file, $line, $data);
        file_put_contents($this->configService->getConfig('log', 'file'), $message, FILE_APPEND);
    }

    private function generateLogMessage(string $file, int $line, string $data): string
    {
        return "{$file}:{$line} - {$data} \n";
    }
}