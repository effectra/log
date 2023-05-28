<?php
declare(strict_types=1);

namespace Effectra\Log;

use Psr\Log\LoggerInterface;

/**
 * Class Logger
 *
 * This class implements the LoggerInterface and provides logging functionality.
 */
class Logger implements LoggerInterface
{
    /**
     * @var string The path to the log file.
     */
    protected string $logFilePath;

    /**
     * Logger constructor.
     *
     * @param string $logFilePath The path to the log file.
     */
    public function __construct(string $logFilePath)
    {
        $this->logFilePath = $logFilePath;
    }

    /**
     * Logs a message with the emergency level.
     *
     * @param string|\Stringable $message The log message to write. This can be a string or an object that implements the __toString() method.
     * @param array $context (optional) An associative array of additional context data to include in the log entry.
     *
     * @return void
     */
    public function emergency(string|\Stringable $message, array $context = []): void
    {
        // Log message with emergency level
        $this->logMessage('emergency', $message, $context);
    }

    /**
     * Logs a message with the alert level.
     *
     * @param string|\Stringable $message The log message to write. This can be a string or an object that implements the __toString() method.
     * @param array $context (optional) An associative array of additional context data to include in the log entry.
     *
     * @return void
     */
    public function alert(string|\Stringable $message, array $context = []): void
    {
        // Log message with alert level
        $this->logMessage('alert', $message, $context);
    }

    /**
     * Logs a message with the critical level.
     *
     * @param string|\Stringable $message The log message to write. This can be a string or an object that implements the __toString() method.
     * @param array $context (optional) An associative array of additional context data to include in the log entry.
     *
     * @return void
     */
    public function critical(string|\Stringable $message, array $context = []): void
    {
        // Log message with critical level
        $this->logMessage('critical', $message, $context);
    }

    /**
     * Logs a message with the error level.
     *
     * @param string|\Stringable $message The log message to write. This can be a string or an object that implements the __toString() method.
     * @param array $context (optional) An associative array of additional context data to include in the log entry.
     *
     * @return void
     */
    public function error(string|\Stringable $message, array $context = []): void
    {
        // Log message with error level
        $this->logMessage('error', $message, $context);
    }

    /**
     * Logs a message with the warning level.
     *
     * @param string|\Stringable $message The log message to write. This can be a string or an object that implements the __toString() method.
     * @param array $context (optional) An associative array of additional context data to include in the log entry.
     *
     * @return void
     */
    public function warning(string|\Stringable $message, array $context = []): void
    {
        // Log message with warning level
        $this->logMessage('warning', $message, $context);
    }

    /**
     * Logs a message with the notice level.
     *
     * @param string|\Stringable $message The log message to write. This can be a string or an object that implements the __toString() method.
     * @param array $context (optional) An associative array of additional context data to include in the log entry.
     *
     * @return void
     */
    public function notice(string|\Stringable $message, array $context = []): void
    {
        // Log message with notice level
        $this->logMessage('notice', $message, $context);
    }

    /**
     * Logs a message with the info level.
     *
     * @param string|\Stringable $message The log message to write. This can be a string or an object that implements the __toString() method.
     * @param array $context (optional) An associative array of additional context data to include in the log entry.
     *
     * @return void
     */
    public function info(string|\Stringable $message, array $context = []): void
    {
        // Log message with info level
        $this->logMessage('info', $message, $context);
    }

    /**
     * Logs a message with the debug level.
     *
     * @param string|\Stringable $message The log message to write. This can be a string or an object that implements the __toString() method.
     * @param array $context (optional) An associative array of additional context data to include in the log entry.
     *
     * @return void
     */
    public function debug(string|\Stringable $message, array $context = []): void
    {
        // Log message with debug level
        $this->logMessage('debug', $message, $context);
    }

    /**
     * Logs a message with the specified level.
     *
     * @param mixed $level The log level.
     * @param string|\Stringable $message The log message to write. This can be a string or an object that implements the __toString() method.
     * @param array $context (optional) An associative array of additional context data to include in the log entry.
     *
     * @return void
     */
    public function log($level, string|\Stringable $message, array $context = []): void
    {
        // Log message with specified level
        $this->logMessage($level, $message, $context);
    }

    /**
     * Writes a log message to the log file.
     *
     * @param string $level The log level (e.g. 'debug', 'info', 'warning', 'error', 'critical').
     * @param string|\Stringable $message The log message to write. This can be a string or an object that implements the __toString() method.
     * @param array $context (optional) An associative array of additional context data to include in the log entry.
     *
     * @return void
     */
    private function logMessage($level, string|\Stringable $message, array $context = []): void
    {
        // Log message with specified level
        switch ($level) {
            case 'emergency':
                $internalLogLevel = 'severe';
                break;
            case 'alert':
                $internalLogLevel = 'severe';
                break;
            case 'critical':
                $internalLogLevel = 'severe';
                break;
            case 'error':
                $internalLogLevel = 'error';
                break;
            case 'warning':
                $internalLogLevel = 'warning';
                break;
            case 'notice':
                $internalLogLevel = 'info';
                break;
            case 'info':
                $internalLogLevel = 'info';
                break;
            case 'debug':
                $internalLogLevel = 'debug';
                break;
            default:
                $internalLogLevel = 'unknown';
        }
        $logMessage = sprintf("[%s] %s %s\n", date('Y-m-d H:i:s'), strtoupper($internalLogLevel), $message);

        // If context data was provided, add it to the log message
        if (!empty($context)) {
            $logMessage .= print_r($context, true) . "\n";
        }

        // Write the log message to a file
        $logFile = $this->file();
        file_put_contents($logFile, $logMessage, FILE_APPEND);
    }

    /**
     * Returns the path to the log file.
     *
     * @return string The path to the log file.
     * @throws \Exception If the log file path is invalid.
     */
    public function file(): string
    {
        if (!$this->logFilePath) {
            throw new \Exception("Invalid Log File");
        }
        return $this->logFilePath;
    }
}
