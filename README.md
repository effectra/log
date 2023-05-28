# Effectra\Log

Effectra\Log is a logging library that provides a simple and flexible way to handle logging in your PHP applications. It implements the [PSR-3 LoggerInterface](https://www.php-fig.org/psr/psr-3/) and includes additional features for log handling.

## Installation

You can install the Effectra\Log library via Composer. Run the following command in your project directory:

```
composer require effectra/log
```

## Usage

To use the Effectra\Log library in your project, follow these steps:

1. Create an instance of the `Logger` class:
   ```php
   use Effectra\Log\Logger;

   $logger = new Logger('/path/to/log/file.log');
   ```

2. Start logging messages:
   ```php
   $logger->info('This is an informational message.');
   $logger->error('An error occurred.', ['context' => 'additional data']);
   // ...
   ```

3. Customize log levels:
   ```php
   use Effectra\Log\LogLevel;

   $logger->log(LogLevel::DEBUG, 'Debug message');
   $logger->log(LogLevel::WARNING, 'Warning message');
   // ...
   ```

4. Set the logger instance on other classes (optional):
   ```php
   use Effectra\Log\LoggerAware;
   use Psr\Log\LoggerInterface;

   class MyClass implements LoggerAware
   {
       public function __construct(LoggerInterface $logger)
       {
           $this->setLogger($logger);
       }

       // ...
   }
   ```

For more detailed information on the available methods and features, refer to the code documentation and the [PSR-3 LoggerInterface](https://www.php-fig.org/psr/psr-3/) documentation.

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please open an issue or submit a pull request on the [GitHub repository](https://github.com/effectra/log).

## License

The Effectra\Log library is open-source software released under the [MIT License](https://opensource.org/licenses/MIT).