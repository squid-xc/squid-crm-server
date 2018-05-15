<?php
namespace App\Service;

use App\Repository\SyslogsRepository;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/14
 * Time: 16:00
 */
class SyslogService{

    /**
     * @var SyslogsRepository
     */
    private $syslogs_repository;

    /**
     * @param SyslogsRepository $syslogs_repository
     */
    public function setSyslogsRepository($syslogs_repository)
    {
        $this->syslogs_repository = $syslogs_repository;
        return $this;
    }

    public function get($id){
        $id = intval($id);
        if(empty($id)){
            return false;
        }
        return $this->syslogs_repository->get($id);
    }

    public function createForAdd($stuff_id,$module_id,$description){
        return $this->syslogs_repository->createForAdd($stuff_id,$module_id,$description);
    }

    public function createForUpdate($stuff_id,$module_id,$description){
        return $this->syslogs_repository->createForUpdate($stuff_id,$module_id,$description);
    }

    public function createForQuery($stuff_id,$module_id,$description){
        return $this->syslogs_repository->createForQuery($stuff_id,$module_id,$description);
    }

    public function createForDelete($stuff_id,$module_id,$description){
        return $this->syslogs_repository->createForDelete($stuff_id,$module_id,$description);
    }

    public function paginateGetList($page,$page_size,$module_id,$from_time,$to_time){
        return $this->syslogs_repository->paginateGetList($page,$page_size,$module_id,$from_time,$to_time);
    }

}