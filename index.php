<?php
include 'include/config.php';
include 'include/classes/autoloader.class.php';
spl_autoload_register(array('Autoloader', 'loadPackages'));
include 'include/vendor/autoload.php';


$loader = new Twig_Loader_Filesystem(DIR.'include/templates/site/main/');
$twig = new Twig_Environment($loader);
$template = $twig->loadTemplate('main.twig');


$temp = config::getParam('config.ini', 'temp');
$status = config::getParam('config.ini', 'status');
$timer = config::getParam('config.ini', 'timer');
$speed = config::getParam('config.ini', 'speed');

$param = array( 'temp' => $temp,
                'status' => $status,
                'timer' => $timer,
                'speed' => $speed,
                'sheduleStatus' => config::getParam('config.ini', 'sheduleStatus'),
                'scheduleSpeed' => config::getParam('config.ini', 'sheduleSpeed'),
                'scheduleTemp' => config::getParam('config.ini', 'sheduleTemp'),
                'sheduleTime0' => config::getParam('config.ini', 'sheduleTime0'),
                'sheduleTime1' => config::getParam('config.ini', 'sheduleTime1'),
                'sheduleTime2' => config::getParam('config.ini', 'sheduleTime2'),
                'sheduleTime3' => config::getParam('config.ini', 'sheduleTime3'),
                'sheduleTime4' => config::getParam('config.ini', 'sheduleTime4'),
                'sheduleTime5' => config::getParam('config.ini', 'sheduleTime5'),
                'sheduleTime6' => config::getParam('config.ini', 'sheduleTime6'),
                'sheduleTime7' => config::getParam('config.ini', 'sheduleTime7'),
                'sheduleTime8' => config::getParam('config.ini', 'sheduleTime8'),
                'sheduleTime9' => config::getParam('config.ini', 'sheduleTime9'),
                'sheduleTime10' => config::getParam('config.ini', 'sheduleTime10'),
                'sheduleTime11' => config::getParam('config.ini', 'sheduleTime11'),
                'sheduleTime12' => config::getParam('config.ini', 'sheduleTime12'),
                'sheduleTime13' => config::getParam('config.ini', 'sheduleTime13'),
                'sheduleTime14' => config::getParam('config.ini', 'sheduleTime14'),
                'sheduleTime15' => config::getParam('config.ini', 'sheduleTime15'),
                'sheduleTime16' => config::getParam('config.ini', 'sheduleTime16'),
                'sheduleTime17' => config::getParam('config.ini', 'sheduleTime17'),
                'sheduleTime18' => config::getParam('config.ini', 'sheduleTime18'),
                'sheduleTime19' => config::getParam('config.ini', 'sheduleTime19'),
                'sheduleTime20' => config::getParam('config.ini', 'sheduleTime20'),
                'sheduleTime21' => config::getParam('config.ini', 'sheduleTime21'),
                'sheduleTime22' => config::getParam('config.ini', 'sheduleTime22'),
                'sheduleTime23' => config::getParam('config.ini', 'sheduleTime23')
        );

echo $template->render($param);