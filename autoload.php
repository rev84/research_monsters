<?php

if (DIRECTORY_SEPARATOR == '\\') {
    define('SP', '\\\\');
}
else {
    define('SP', DIRECTORY_SEPARATOR);
}

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

        $pathes = glob($realPathDir.SP.'*');
        foreach ($pathes as $path) {
            //echo $path."\n";
            if (is_dir($path) && $funcSearchClass($path, $className)) {
                return true;
            }
            elseif (preg_match('`'.SP.''.$className.'\.class\.php$`', $path)) {
                include $path;
                return true;
            }
        }
        
        return false;
    };
    
    foreach ($autoloadDirs as $dir) {
        $realDir = realpath(dirname(__FILE__).SP.$dir);
        if($funcSearchClass($realDir, $className)) {
            return true;
        }
    }
    return false;
});
