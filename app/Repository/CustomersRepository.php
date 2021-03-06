<?php
namespace App\Repository;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/11
 * Time: 14:03
 */
class CustomersRepository extends Repository{

    public function paginateGetList($where,$page = 1,$limit = 15){
        $page = intval($page);
        $limit = intval($limit);
        if(empty($page) || empty($limit) || !is_array($where) || empty($where)){
            return [];
        }
        return  $this->model::where($where)->
        select(['*'])->orderBy('created_at','desc')->paginate($limit, ['*'], 'page', $page);
    }

    public function isNameConflict($id,$name){
        $id = intval($id);
        if(empty($id) || empty($name)){
            return true;
        }

        $entry = $this->model::where('id','<>',$id)->where('name',$name)->select(['*'])->first();
        if(!empty($entry)){
            return true;
        }
        return false;
    }

}