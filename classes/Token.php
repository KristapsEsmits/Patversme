<?php
class Token
{
    #Generate a token and store it in the session
    public static function generate()
    {
        return Session::put(Config::get('session/token_name'), md5(uniqid()));
    }

    #Check if the given token matches the one stored in the session
    public static function check($token)
    {
        $tokenName = Config::get('session/token_name');

        if (Session::exists($tokenName) && $token === Session::get($tokenName)) {
            #Delete the token from the session if it matches
            Session::delete($tokenName);
            return true;
        }

        return false;
    }
}