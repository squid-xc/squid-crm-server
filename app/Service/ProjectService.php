<?php
namespace App\Service;

use App\Repository\ProjectsRepository;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/14
 * Time: 16:41
 */
class ProjectService{

    /**
     * @var ProjectsRepository
     */
    private $project_repository;

    public function setProjectRepository(ProjectsRepository $projectsRepository){
        $this->project_repository = $projectsRepository;
        return $this;
    }

    public function get($id){
        $id = intval($id);
        if(empty($id)){
            return false;
        }
        return $this->project_repository->get($id);
    }

    public function create($entity){
        if(!is_array($entity) || empty($entity)){
            return false;
        }
        return $this->project_repository->create($entity);
    }

    public function update($id,$entity){
        $id = intval($id);
        if(empty($id) || !is_array($entity) || empty($entity)){
            return false;
        }

        return $this->project_repository->update($id,$entity);
    }

    public function delete($id){
        if(empty($id)){
            return false;
        }
        return $this->project_repository->delete($id);
    }

    public function paginateGetList($where,$page = 1,$limit = 15){
        return $this->project_repository->paginateGetList($where,$page,$limit);
    }

}