<?php
#function to prevent XSS (cross-site scripting) attacks by encoding potentially malicious characters (<, >, &, ", ')
function escape($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}