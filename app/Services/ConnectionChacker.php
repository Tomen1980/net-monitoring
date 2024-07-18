<?php
// app/Services/ConnectionChecker.php
namespace App\Services;

class ConnectionChacker
{
    public static function check($ip)
    {
        $output = [];
        $result = null;

        // Jalankan perintah ping (untuk Windows)
        exec("ping -n 1 $ip", $output, $result);

        if (strpos(implode(" ", $output), "Destination net unreachable") !== false) {
            return "Destination net unreachable";
        } elseif (strpos(implode(" ", $output), "Destination host unreachable") !== false) {
            return "Destination host unreachable";
        } elseif (strpos(implode(" ", $output), "Request timed out") !== false) {
            return "Request timed out";
        } elseif ($result === 0) {
            return "Connected";
        } else {
            return "Disconnected";
        }
    }
}
