<?php
namespace App\Helpers;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/17
 * Time: 14:16
 */
class ArrayHelper{

    public static function only($array,$filter = '*'){
        if($filter == '*'){
            return $array;
        }

        if(empty($filter)){
            return $array;
        }
        if(is_array($filter)){
            $assemble_array = [];
            foreach ($filter as $key){
                $assemble_array[$key] = $array[$key];
            }
            return $assemble_array;
        }
        return $array[$filter];
    }

}