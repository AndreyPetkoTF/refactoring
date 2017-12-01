<?php

namespace App\App;

use App\Database\DatabaseInterface;
use App\Exception\NoMessageException;
use App\Exception\WrongConfigKeyException;
use App\Log\LoggerInterface;
use App\Service\{
    ConfigService,
    CurlSender,
    EmailSender
};

/**
 * Class App
 * @package App
 */
class App
{
    /**
     * @var DatabaseInterface
     */
    private $database;
    /**
     * @var ConfigService
     */
    private $configService;
    /**
     * @var CurlSender
     */
    private $curlSender;
    /**
     * @var EmailSender
     */
    private $emailSender;
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * App constructor.
     * @param DatabaseInterface $database
     * @param ConfigService $configService
     * @param CurlSender $curlSender
     * @param EmailSender $emailSender
     * @param LoggerInterface $logger
     */
    public function __construct(
        DatabaseInterface $database,
        ConfigService $configService,
        CurlSender $curlSender,
        EmailSender $emailSender,
        LoggerInterface $logger
    ) {
        $this->configService = $configService;
        $this->database = $database;
        $this->curlSender = $curlSender;
        $this->emailSender = $emailSender;
        $this->logger = $logger;
    }


    /**
     * @param int $value
     * @param string|null $emailTo
     * @return bool
     */
    private function boot(int $value, string $emailTo = null): bool
    {
        $emailTo = $emailTo?: $this->configService->getConfig('email', 'to');

        $url = $this->configService->getConfig('http', 'url');
        $content = $this->curlSender->getContentByUrl($url);

        $success = $this->database->write($content);

        if (true === $success) {
            $this->emailSender->sendEmail(
                $emailTo,
                $this->configService->getConfig('email', 'from'),
                $this->getMessageByValue($value)
            );
        }

        return $success;
    }

    /**
     * @param int $value
     * @param string|null $emailTo
     */
    public function run(int $value, string $emailTo = null): void
    {
        try {
            $this->boot($value, $emailTo);
        } catch (NoMessageException | WrongConfigKeyException  $exception) {
            $this->logger->log(__FILE__, __LINE__, $exception->getMessage());
            printf("Looks like something went wrong, please try again");
        }
    }

    /**
     * @param int $value
     * @return string
     * @throws NoMessageException
     */
    private function getMessageByValue(int $value)
    {
        if ($value >= 3 && $value < 6) {
            return 'Your Value is too low';
        }

        if ($value === 7) {
            return 'Your Value equals to 7';
        }

        throw new NoMessageException($value);
    }

}