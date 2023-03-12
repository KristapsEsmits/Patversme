<?php
class Config
{
    public static function get($path = null) #Null so can check if exists
    {
        if ($path) { #Checks if $path is not null
            $config = $GLOBALS['config']; #Gets the global config array
            $path = explode('/', $path); #Splits the $path string into an array

            foreach ($path as $bit) {
                if (isset($config[$bit])) { #Checks if the current $bit element exists in the $config
                    $config = $config[$bit];
                }
            }
            return $config;
        }
    }
}