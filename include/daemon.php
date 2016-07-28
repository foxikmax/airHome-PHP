<?php
include '/var/www/air/include/config.php';
include '/var/www/air/include/classes/autoloader.class.php';
spl_autoload_register(array('Autoloader', 'loadPackages'));
include '/var/www/air/include/vendor/autoload.php';

$sheduleStatus = config::getParam('config.ini', 'sheduleStatus');

if($sheduleStatus == 1){
    $scheduleTemp = config::getParam('config.ini', 'sheduleTemp');
    $scheduleSpeed = config::getParam('config.ini', 'sheduleSpeed');
    $nowHour = date("G");
    $cmd = '';

    if(config::getParam('config.ini', 'sheduleTime'.$nowHour) == 1){
        if(config::getParam('config.ini', 'status') === 'Выключен'){
            $cmd = 'poweron';
        }
    }
    else{
        if(config::getParam('config.ini', 'status') === 'Включен'){
            $cmd = 'poweroff';
        }
    }

    if($cmd != ''){
        command(array('action' => 'command', 'cmd' => $cmd));
        sleep(15);

        command(array('action' => 'command', 'cmd' => $scheduleTemp));
        sleep(15);

        command(array('action' => 'command', 'cmd' => $scheduleSpeed));
    }
}


function command($post){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, URL.'/action.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $html = curl_exec($ch);
    logger::print_debug_info('commandStatus', $html);
    curl_close($ch);
}