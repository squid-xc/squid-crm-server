<?php
namespace App\Service;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/11
 * Time: 16:04
 */
class CustomerService{

    /**
     * @var \App\Repository\CustomersRepository;
     */
    private $customer_repository;

    public function setCustomerRepository($repository){
        $this->customer_repository = $repository;
        return $this;
    }

    public function create($customer){
        if(!is_array($customer) || empty($customer)){
            return false;
        }
        return $this->customer_repository->create($customer);
    }

    public function update($id,$customer){
        $id = intval($id);
        if(empty($id) || !is_array($customer) || empty($customer)){
            return false;
        }

        return $this->customer_repository->update($id,$customer);
    }

    public function delete($id){
        $id = intval($id);
        if(empty($id)){
            return false;
        }
        return $this->customer_repository->delete($id);
    }

    public function paginateGetList($where,$page = 1,$limit = 15){
        return $this->customer_repository->paginateGetList($where,$page,$limit);
    }

}