<?php
namespace App\Helpers;

class StringHelper{

    /**
     * 下划线分割转大小写分割<br>
     * 若$ucfirst为false，首字母小写，默认为所有分词首字母大写
     * @param string $str
     * @param bool $ucfirst
     * @return string
     */
    public static function underscore2case($str, $ucfirst = true){
        $explodes = explode('_', $str);
        foreach($explodes as $key => &$e){
            if(!$key && $ucfirst){
                $e = ucfirst($e);
            }else if($key){
                $e = ucfirst($e);
            }
        }
        return implode('', $explodes);
    }

    /**
     * 大小写分割转下划线分割
     * @param string $str
     * @return string
     */
    public static function case2underscore($str){
        $new_str = '';
        $str_length = strlen($str);
        for($i = 0; $i < $str_length; $i++){
            $ascii_code = ord($str[$i]);
            if($ascii_code >= 65 && $ascii_code <= 90){
                if($i){
                    $new_str .= '_';
                }
                $new_str .= chr($ascii_code + 32);
            }else{
                $new_str .= $str[$i];
            }
        }
        return $new_str;
    }

}