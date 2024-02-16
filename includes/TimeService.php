<?php
class TimeService
{
    public function getServerTimeInMilliseconds() {
        return round(microtime(true) *  1000);
    }

    public function getWorldTimeInMilliseconds() {
        $worldTime = file_get_contents('http://worldtimeapi.org/api/timezone/Etc/UTC');
        $worldTimeData = json_decode($worldTime, true);
        return strtotime($worldTimeData['datetime']) *  1000;
    }

    public function checkTimeDifference() {
        $serverTime = $this->getServerTimeInMilliseconds();
        $worldTime = $this->getWorldTimeInMilliseconds();
        $timeDifference = abs($worldTime - $serverTime);
        $allowed_difference =  1000; // +/-  1 second

        if ($timeDifference > $allowed_difference) {
            throw new Exception("The server time difference {$timeDifference} is more than {$allowed_difference} milliseconds off from the world time.");
        }

        echo "Server Time: {$serverTime} ms\n";
        echo "World Time: {$worldTime} ms\n";
        echo "Difference: {$timeDifference} ms\n";
    }
}
