<?php
class Config
{
    public static function get($path = null) #Null so can check if exists
    {
        if ($path) { #Where is cofing comming from
            $config = $GLOBALS['config'];
            $path = explode('/', $path);

            print_r($path);
        }
    }
}