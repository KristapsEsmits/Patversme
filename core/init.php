<?php
session_start();

$GLOBALS['config'] = array(
    #Mysql settings
    'mysql' => array(
        #127.0.0.1 - so you dont need to do dns lookup
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'patversme'
    ),
    #How long users will be remembered (cookie expiry)
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    #Session name and token
    'session' => array(
        'session_name' => 'user'
    )
);

#Includes all classes files (Allows to pass function so require_once is used only once)
spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});

#Includes functions
require_once 'functions/sanitize.php';