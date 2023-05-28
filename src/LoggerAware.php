<?php

declare(strict_types=1);

namespace Effectra\Log;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;

/**
 * The `LoggerAware` class is an implementation of the `LoggerAwareInterface`
 * interface that can be used as a trait or base class for other classes.
 *
 * This class provides a basic implementation of the `setLogger` method, which
 * sets the injected logger instance on the `$logger` property of the class.
 */
class LoggerAware implements LoggerAwareInterface
{
    /**
     * The logger instance.
     *
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * Sets a logger instance on the object.
     *
     * @param LoggerInterface $logger The logger instance to set.
     *
     * @return void
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }
}
