<?php

interface Logger 
{
    public function log(string $message): void;
}

class FileLogger implements Logger 
{
    public function log(string $message): void 
    {
        echo "Log para arquivo de texto: $message\n";
    }
}

class DatabaseLogger implements Logger
{
    public function log(string $message): void 
    {
        echo "Log para banco de dados: $message\n";
    }
}

abstract class LoggerFactory {
    abstract public function createLogger(): Logger;

    public function log(string $message): void {
        $logger = $this->createLogger();
        $logger->log(message: $message);
    }
}

class FileLoggerFactory extends LoggerFactory {
    public function createLogger(): Logger {
        return new FileLogger();
    }
}

class DatabaseLoggerFactory extends LoggerFactory {
    public function createLogger(): Logger {
        return new DatabaseLogger();
    }
}

$fileLoggerFactory = new FileLoggerFactory();
$fileLoggerFactory->log(message: "Esse é um log de arquivo textual!");

$dbLoggerFactory = new DatabaseLoggerFactory();
$dbLoggerFactory->log(message: "Esse é um log de banco de dados!");
