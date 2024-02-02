<?php

class Logger
{
    private static $filePath = APP_DIR . 'logs/logs.txt'; // get filename from config
    public static function log(string $message): void
    {
        file_put_contents(self::$filePath, $message, FILE_APPEND . PHP_EOL);
    }
}