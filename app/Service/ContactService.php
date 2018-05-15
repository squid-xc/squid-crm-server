<?php
namespace App\Service;
use App\Repository\ContactsRepository;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/14
 * Time: 16:54
 */
class ContactService{

    /**
     * @var ContactsRepository
     */
    private $contacts_repository;

    public function setContactsRepository(ContactsRepository $contactsRepository){
        $this->contacts_repository = $contactsRepository;
        return $this;
    }

    public function get($id){
        $id = intval($id);
        if(empty($id)){
            return false;
        }
        return $this->contacts_repository->get($id);
    }

    public function create($entity){
        if(!is_array($entity) || empty($entity)){
            return false;
        }
        return $this->contacts_repository->create($entity);
    }

    public function update($id,$entity){
        $id = intval($id);
        if(empty($id) || !is_array($entity) || empty($entity)){
            return false;
        }

        return $this->contacts_repository->update($id,$entity);
    }

    public function delete($id){
        if(empty($id)){
            return false;
        }
        return $this->contacts_repository->delete($id);
    }

    public function paginateGetList($where,$page = 1,$limit = 15){
        return $this->contacts_repository->paginateGetList($where,$page,$limit);
    }

}