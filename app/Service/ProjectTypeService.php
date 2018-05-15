<?php
namespace App\Service;
use App\Repository\ProjectTypesRepository;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/14
 * Time: 17:05
 */
class ProjectTypeService{

    /**
     * @var ProjectTypesRepository
     */
    private $project_types_repository;

    public function setProjectTypesRepository(ProjectTypesRepository $projectTypesRepository){
        $this->project_types_repository = $projectTypesRepository;
        return $this;
    }

    public function get($id){
        $id = intval($id);
        if(empty($id)){
            return false;
        }
        return $this->project_types_repository->get($id);
    }

    public function create($entity){
        if(!is_array($entity) || empty($entity)){
            return false;
        }
        return $this->project_types_repository->create($entity);
    }

    public function update($id,$entity){
        $id = intval($id);
        if(empty($id) || !is_array($entity) || empty($entity)){
            return false;
        }

        return $this->project_types_repository->update($id,$entity);
    }

    public function delete($id){
        if(empty($id)){
            return false;
        }
        return $this->project_types_repository->delete($id);
    }

    public function paginateGetList($where,$page = 1,$limit = 15){
        return $this->project_types_repository->paginateGetList($where,$page,$limit);
    }

}