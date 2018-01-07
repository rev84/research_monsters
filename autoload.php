<?php

spl_autoload_register(function ($className) {
    // クラスファイルを探索するディレクトリ
    $autoloadDirs = [
        'monsters',
        'skills',
        'status',
        'lib',
    ];
    
    $funcSearchClass = function($realPathDir, $className) use (&$funcSearchClass)
    {
        $pathes = glob($realPathDir.'/*');
        foreach ($pathes as $path) {
            if (is_dir($path) && $funcSearchClass($path, $className)) {
                return true;
            }
            elseif (preg_match('`'.DIRECTORY_SEPARATOR.''.$className.'\.class\.php$`', $path)) {
                include $path;
                return true;
            }
        }
        
        return false;
    };
    
    foreach ($autoloadDirs as $dir) {
        $realDir = realpath(dirname(__FILE__).DIRECTORY_SEPARATOR.$dir);
        if($funcSearchClass($dir, $className)) {
            return true;
        }
    }
    return false;
});
