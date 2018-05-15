<?php
namespace App\Repository;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/15
 * Time: 11:12
 */
class IndustriesRepository extends Repository{

    public function getAllIndustries(){
        $where = [
            'deleted_at' => NULL,
        ];
        return  $this->model::where($where)->
        select(['*'])->orderBy('sort','desc')->orderBy('created_at','desc')->get();
    }

}