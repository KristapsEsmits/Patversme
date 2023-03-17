<?php
class Redirect
{
    public static function to($location = null)
    {
        if (is_numeric($location)) {
            switch ($location) {
                case 404:
                    header('HTTP/1.0 404 Not Found');
                    include 'includes/errors/404.php';
                    exit();
            }
            switch ($location) {
                case 402:
                    header('HTTP/1.0 402 Not Found');
                    include 'includes/errors/402.php';
                    exit();
            }
        }
        if ($location) {
            header('Location:' . $location);
            exit();
        }
    }
}