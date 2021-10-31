<?php

namespace App\Common\Facade;

use DateTime;

/**
 * @author https://github.com/CuaMcCarsaree44
 * @since July, 7/24/2021 2021 03:52:10
 *
 * TimeFacade
 * Insert Description Here...
 */
class TimeFacade
{
    /**
     * MESSING WITH CURRENT TIMESTAMP
     */
    public function getStringifiedEpochTime(): string {
        return date("d-m-Y H:i:s");
    }

    private function getCurrentTimestampWithAddition(int $value, string $unit): DateTime {
        $time  = new DateTime('now');

        $time->add(new \DateInterval('PT' . $value . $unit));
        return $time;
    }

    public function currentAddHours(int $value): DateTime {
        return $this->getCurrentTimestampWithAddition($value, 'H');
    }

    public function currentAddMinutes(int $value): DateTime {
        return $this->getCurrentTimestampWithAddition($value, 'M');
    }

    /**
     * MESSING WITH X TIMESTAMP
     */

    public function getCustomTimeWithAddition(DateTime $time, int $value, string $unit): DateTime {

        Console::writeLine("Time is " . json_encode($time));
        $time->add(new \DateInterval('PT' . $value . $unit));
        return $time;
    }

}