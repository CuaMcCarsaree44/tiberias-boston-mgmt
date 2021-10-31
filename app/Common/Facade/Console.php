<?php

namespace App\Common\Facade;
use Overtrue\PHPLint\Output\ConsoleOutput;

/**
 * @author https://github.com/CuaMcCarsaree44
 * @since July, 7/24/2021 2021 03:45:25
 *
 * ServeWriter
 * A facade to write message in Artisan Console since it's syntax is too complicated.
 */
class Console
{
    public static function writeLine(string $message, string $type = null): void {

        $logType = match($type) {
          'e' => "ERROR",
          'w' => "WARNING",
          'v' => "VERBOSE",
          'i' => "INFO",
          'd' => "DEBUG",
            default => "LOG"
        };

        $currentEpoch = (new TimeFacade())->getStringifiedEpochTime();

        $console = new \Symfony\Component\Console\Output\ConsoleOutput;

        $console->writeln("[$logType][$currentEpoch] $message");
    }
}