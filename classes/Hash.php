<?php
class Hash
{
    #Password salting adds random characters before or after a password prior to hashing to obfuscate the actual password
    #Method hashes a given string by appending a salt and using SHA-256 algorithm
    public static function make($string, $salt = '')
    {
        return hash('sha256', $string . $salt);
    }

    #Method generates random bytes of specified length to be used as a salt
    public static function salt($length)
    {
        return random_bytes($length);
    }

    #Method generates a unique hash value by using the make() method with the current timestamp as the input
    public static function unique()
    {
        return self::make(uniqid());
    }
}