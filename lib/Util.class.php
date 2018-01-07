<?php
/**
 * Description of Util
 *
 * @author revin
 */
class Util
{
    /**
     * サイコロを振る
     * @param type $max
     * @return type
     */
    public static function dice($max = 6)
    {
        return mt_rand(1, $max);
    }
    
    /**
     * ログを消去
     * @param type $str
     */
    public static function logClear()
    {
        if (IS_LOG) {
            $filepath = dirname(__FILE__).'/../log.txt';
            file_put_contents($filepath, '');
        }
    }
    
    /**
     * ログを出す
     * @param type $str
     */
    public static function log($str)
    {
        if (IS_LOG) {
            $filepath = dirname(__FILE__).'/../log.txt';
            file_put_contents($filepath, $str."\n", FILE_APPEND);
        }
    }

    /**
     * 標準出力に出す
     * @param type $str
     */
    public static function pl($str)
    {
        echo mb_convert_encoding($str."\n", 'Shift_JIS', 'UTF-8');
    }
    
}
