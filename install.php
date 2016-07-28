<?php
include 'include/config.php';
include 'include/classes/autoloader.class.php';

$ip = '192.168.2.36';
$port = '80';

config::changeConfig($filename, 'ip', $ip);
config::changeConfig($filename, 'port', $port);