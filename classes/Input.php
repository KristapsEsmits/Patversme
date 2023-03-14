<?php
class Input
{
    public static function exists($type = 'post')
    {
        #A switch statement to check the value of $type
        switch ($type) {
            #If $type is 'post', return true if $_POST is not empty, and false otherwise
            case 'post':
                return (!empty($_POST)) ? true : false;
            #If $type is 'get', return true if $_GET is not empty, and false otherwise
            case 'get':
                return (!empty($_POST)) ? true : false;
            #For any other value of $type, return false
            default:
                return false;
        }
    }

    public static function get($item)
    {
        if (isset($_POST[$item])) {
            return $_POST[$item];
        } else if (isset($_GET[$item])) {
            return $_GET[$item];
        }
        return '';
    }
}