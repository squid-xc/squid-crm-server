<?php
namespace App\Repository;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/14
 * Time: 16:40
 */
class ProjectsRepository extends Repository{

    public function paginateGetList($where,$page = 1,$limit = 15){
        $page = intval($page);
        $limit = intval($limit);
        if(empty($page) || empty($limit) || !is_array($where) || empty($where)){
            return [];
        }
        return  $this->model::where($where)->
        select(['*'])->orderBy('created_at','desc')->paginate($limit, ['*'], 'page', $page);
    }

}