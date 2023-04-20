<?php
session_start();

$GLOBALS['config'] = array(
    //Mysql settings
    'mysql' => array(
        //127.0.0.1 - so you dont need to do dns lookup
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'patversme'
    ),
    //How long users will be remembered (cookie expiry)
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    //Session name and token
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )
);

//Includes all classes files (Allows to pass function so require_once is used only once)
spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});

//Includes functions
require_once 'functions/sanitize.php';

if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

    if ($hashCheck->count()) {
        $user = new User($hashCheck->results()[0]->user_id);
        $user->login();
    }
}