<?php

namespace App\Service;

use App\Repository\DutiesRepository;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/14
 * Time: 16:19
 */
class DutyService
{

    /**
     * @var DutiesRepository
     */
    private $duties_repository;

    public function setDutiesRepository(DutiesRepository $dutiesRepository)
    {
        $this->duties_repository = $dutiesRepository;
        return $this;
    }

    public function get($id){
        $id = intval($id);
        if(empty($id)){
            return false;
        }
        return $this->duties_repository->get($id);
    }

    public function create($duty)
    {
        if (!is_array($duty) || empty($duty)) {
            return false;
        }
        return $this->duties_repository->create($duty);
    }

    public function update($id, $duty)
    {
        $id = intval($id);
        if (empty($id) || !is_array($duty) || empty($duty)) {
            return false;
        }
        return $this->duties_repository->update($id, $duty);
    }

    public function delete($id){
        if(empty($id)){
            return false;
        }
        return $this->duties_repository->delete($id);
    }

    public function paginateGetList($where,$page = 1,$limit = 15){
        return $this->duties_repository->paginateGetList($where,$page,$limit);
    }

}