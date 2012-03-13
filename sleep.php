<?php
/**
 * sleep.php
 *
 * introduce an artificial delay for resources
 *
 * Works by issuing an HTTP redirect to the GET parameter 'u'
 * after an amount of time (GET param 's' or random #).
 *
 * Copyright (c) 2012 Port 8000 GmbH
 * This code can be used under the terms of the GPL and MIT licenses.
 */

if (! array_key_exists('u', $_GET)) {
    header('HTTP/1.0 404 Not Found');
    exit(1);
}
$url = $_GET['u'];

if (array_key_exists('s', $_GET)) {
    $time = min(0 + $_GET['s'], 300);
} else {
    $time = rand(5, 30);
}

sleep($time);

header('HTTP/1.0 303 See Other');
header('Location: '.$url);

//__END__
