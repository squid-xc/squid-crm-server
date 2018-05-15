<?php
namespace App\Service;
use App\Repository\CompaniesRepository;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/14
 * Time: 16:27
 */
class CompanyService{

    /**
     * @var CompaniesRepository
     */
    private $companies_repository;

    public function setCompaniesRepository(CompaniesRepository $companiesRepository){
        $this->companies_repository = $companiesRepository;
        return $this;
    }

    public function get($id){
        $id = intval($id);
        if(empty($id)){
            return false;
        }
        return $this->companies_repository->get($id);
    }

    public function create($company){
        if(!is_array($company) || empty($company)){
            return false;
        }
        return $this->companies_repository->create($company);
    }

    public function update($id,$company){
        $id = intval($id);
        if(empty($id) || !is_array($company) || empty($company)){
            return false;
        }

        return $this->companies_repository->update($id,$company);
    }

    public function delete($id){
        if(empty($id)){
            return false;
        }
        return $this->companies_repository->delete($id);
    }

    public function paginateGetList($where,$page = 1,$limit = 15){
        return $this->companies_repository->paginateGetList($where,$page,$limit);
    }

}