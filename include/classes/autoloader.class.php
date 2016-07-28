<?php
class Autoloader{
    private static $_lastLoadedFilename;

    public static function loadPackages($className){
        $pathParts = explode('_', $className);
        self::$_lastLoadedFilename = implode(DIRECTORY_SEPARATOR, $pathParts) . '.class.php';
        $file = self::$_lastLoadedFilename;
        $path = DIR."include/classes/".$file;
        if (\is_file($path)){
            include_once($path);
        }
    }
}