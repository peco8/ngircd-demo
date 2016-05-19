<?php

set_time_limit(0);
ini_set('display_errors', 'on');

// Fetch IRC server envs
$envs = require_once('./env.php');

// Connect to the network
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
$error = socket_connect($socket, $envs['server'], $envs['port']);

// Add some error handling in case connection was not successful.
if ($socket === false){
    $errorCode = socket_last_error();
    $errorString = socket_strerror($errorCode);
    die("Error $errorCode: $errorString \n");
}

// Send the registration info.
socket_write($socket, "NICK ${envs['nickname']}\r\n");
socket_write($socket, "USER ${envs['ident']} * 8 :${envs['gecos']}\r\n");

// Finally, loop until the socket closes.
while (is_resource($socket)) {

    // Fetch the data from the socket
    $data = trim(socket_read($socket, 1024, PHP_NORMAL_READ));
    echo $data . "\n";

    // Splitting the data into chunks
    $d = explode(' ', $data);

    // Padding the array avoids ugly undefined offset erros.
    $d = array_pad ($d, 10, '');

    // Our ping handler.
    // Ping: $servername.
    if ($d[0] === 'PING') {
        socket_write($socket, 'PONG ' . $envs['channel'] . "\r\n");
    }

    if ($d[1] === '376' || $d[1] === '422') {
        socket_write($socket, 'JOIN ' . $envs['channel'] . "\r\n");
    }

    // Bot collections
    // Chat bot
    if ($d[3] == ':@arukas') {
        $saying = "Aruk" . str_repeat("a", mt_rand(2, 15)) . "s";
        socket_write($socket, 'PRIVMSG ' . $d[2] . " :$saying\r\n");
    }
}
