<?php
class Session
{
    public static function exists($name)
    {
        #Return true if the session variable exists, false otherwise
        return (isset($_SESSION[$name])) ? true : false;
    }

    public static function put($name, $value)
    {
        #This sets the value of $_SESSION[$name] to the value of the $value parameter
        return $_SESSION[$name] = $value;
    }

    public static function get($name)
    {
        #This returns the value of $_SESSION[$name]
        return $_SESSION[$name];
    }

    public static function delete($name)
    {
        #This checks whether the value of $_SESSION[$name] is set or not
        #If the value is set, it unsets the value of $_SESSION[$name]
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }

    public static function flash($name, $string = '')
    {
        #This checks whether the value of $_SESSION[$name] is set or not
        if (self::exists($name)) {
            #If the value is set, it gets the value of $_SESSION[$name] and stores it in a variable named $session
            $session = self::get($name);
            #Then it deletes the value of $_SESSION[$name]
            self::delete($name);
            #Finally, it returns the value of $session
            return $session;
        } else {
            #If the value of $_SESSION[$name] is not set, it sets it to the value of $string parameter
            self::put($name, $string);
        }
    }
}