<?php

use Workerman\Worker;
use Workerman\WebServer;
use Workerman\Autoloader;
use PHPSocketIO\SocketIO;
use Channel\Server;

// =======Channel server========
$channel = new Channel\Server('127.0.0.1');
$io = new SocketIO(2020);
Worker::runAll();