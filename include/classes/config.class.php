<?php
/**
* Config class - класс для работы с файлами конфигурации.
*
* @version 1.0
*/
class config {

    static function getConfig($filename){
        $text = self::readFile($filename);
        if($text === false){
            return array();
        }

        $conf = json_decode($text, true);
        return $conf;
    }

    static function getParam($filename, $key){
        $config = self::getConfig($filename);

        foreach ($config as $cKey => $cValue) {
            if($cKey == $key){
                return $cValue;
            }
        }

        return false;
    }

    static function delParam($filename, $key){
        $config = self::getConfig($filename);
        unset($config[$key]);
        $text = json_encode($config);
        $save = self::saveFile($filename, $text);
        return $save;
    }

    static function changeConfig($filename, $key, $val){
        $config = self::getConfig($filename);
        $config[$key] = $val;
        $text = json_encode($config);
        $save = self::saveFile($filename, $text);
        return $save;

    }

    static function saveFile($filename, $info){
        if(file_exists(CONFILE.$filename) === false){
            return false;
        }

        $w=fopen(CONFILE.$filename,'w+');
        fwrite($w, $info);
        fclose($w);
        return true;
    }

    static function readFile($filename){
        $local_src = CONFILE.$filename;

        if(file_exists($local_src) === false){
            return false;
        }

        $local_file = fopen($local_src, "r");
        $text = fread($local_file, 1000000);
        fclose($local_file);

        return $text;
    }
}