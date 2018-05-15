<?php

namespace App\Service;
use App\Exceptions\IllegalParameterException;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/11
 * Time: 16:04
 */
class CustomerService
{

    /**
     * @var \App\Repository\CustomersRepository;
     */
    private $customer_repository;

    /**
     * @var \App\Repository\IndustriesRepository
     */
    private $industry_repository;

    public function setCustomerRepository($repository)
    {
        $this->customer_repository = $repository;
        return $this;
    }

    public function setIndustryRepository($repository)
    {
        $this->industry_repository = $repository;
        return $this;
    }

    public function get($id)
    {
        $id = intval($id);
        if (empty($id)) {
            return false;
        }
        return $this->customer_repository->get($id);
    }

    private function _checkParams($name, $code, $charge_id, $contact_name, $contact_phone, $phone, $email, $industry_id, $property_id, $legal_person, $province_id, $city_id, $stuff_amount, $address, $zip_code, $url, $fax, $description, $bank_id, $bank_number, $source, $status, $rank, $next_contact_time, $remark, $id = 0)
    {
        if (empty($name)) {
            return false;
        }
        if (empty($contact_name)) {
            return false;
        }
        if (empty($contact_phone)) {
            return false;
        }
        $industry_id = intval($industry_id);
        $property_id = intval($property_id);
        $province_id = intval($province_id);
        $city_id = intval($city_id);
        $source = intval($source);
        $status = intval($status);
        $rank = intval($rank);
        if (!empty($industry_id)) {
            $industry = $this->industry_repository->get($industry_id);
            if (empty($industry)) {
                return false;
            }
        }
        if (!empty($property_id)) {
            if (!Constants::is_customer_property_valid($property_id)) {
                return false;
            }
        }
        if (!empty($province_id)) {
            //todo 检验省份的有效性
        }
        if (!empty($city_id)) {
            //todo 检验市区的有效性
        }
        if (!empty($id)) {
            $res = $this->customer_repository->isNameConflict($id, $name);
            if ($res) {
                throw new IllegalParameterException(400, '客户名称重复');
            }
        }

        return true;
    }

    public function create($name, $code, $charge_id, $contact_name, $contact_phone, $phone, $email, $industry_id, $property_id, $legal_person, $province_id, $city_id, $stuff_amount, $address, $zip_code, $url, $fax, $description, $bank_id, $bank_number, $source, $status, $rank, $next_contact_time, $remark)
    {
        $result = $this->_checkParams($name, $code, $charge_id, $contact_name, $contact_phone, $phone, $email, $industry_id, $property_id, $legal_person, $province_id, $city_id, $stuff_amount, $address, $zip_code, $url, $fax, $description, $bank_id, $bank_number, $source, $status, $rank, $next_contact_time, $remark);
        if (empty($result)) {
            return false;
        }

        $entity = [
            'name' => $name,
            'code' => $code,
            'charge_id' => $charge_id,
            'contact_name' => $contact_name,
            'contact_phone' => $contact_phone,
            'phone' => $phone,
            'email' => $email,
            'industry_id' => $industry_id,
            'property_id' => $property_id,
            'legal_person' => $legal_person,
            'province_id' => $province_id,
            'city_id' => $city_id,
            'stuff_amount' => $stuff_amount,
            'address' => $address,
            'zip_code' => $zip_code,
            'url' => $url,
            'fax' => $fax,
            'description' => $description,
            'bank_id' => $bank_id,
            'bank_number' => $bank_number,
            'source' => $source,
            'status' => $status,
            'rank' => $rank,
            'next_contact_time' => date('Y-m-d', strtotime($next_contact_time)),
            'remark' => $remark
        ];
        return $this->customer_repository->create($entity);
    }

    public function update($id, $name, $code, $charge_id, $contact_name, $contact_phone, $phone, $email, $industry_id, $property_id, $legal_person, $province_id, $city_id, $stuff_amount, $address, $zip_code, $url, $fax, $description, $bank_id, $bank_number, $source, $status, $rank, $next_contact_time, $remark)
    {
        $result = $this->_checkParams($name, $code, $charge_id, $contact_name, $contact_phone, $phone, $email, $industry_id, $property_id, $legal_person, $province_id, $city_id, $stuff_amount, $address, $zip_code, $url, $fax, $description, $bank_id, $bank_number, $source, $status, $rank, $next_contact_time, $remark, $id);
        if (empty($result)) {
            return false;
        }

        $entity = [
            'name' => $name,
            'code' => $code,
            'charge_id' => $charge_id,
            'contact_name' => $contact_name,
            'contact_phone' => $contact_phone,
            'phone' => $phone,
            'email' => $email,
            'industry_id' => $industry_id,
            'property_id' => $property_id,
            'legal_person' => $legal_person,
            'province_id' => $province_id,
            'city_id' => $city_id,
            'stuff_amount' => $stuff_amount,
            'address' => $address,
            'zip_code' => $zip_code,
            'url' => $url,
            'fax' => $fax,
            'description' => $description,
            'bank_id' => $bank_id,
            'bank_number' => $bank_number,
            'source' => $source,
            'status' => $status,
            'rank' => $rank,
            'next_contact_time' => date('Y-m-d', strtotime($next_contact_time)),
            'remark' => $remark
        ];

        return $this->customer_repository->update($id, $entity);
    }

    public function delete($id)
    {
        if (empty($id)) {
            return false;
        }
        return $this->customer_repository->delete($id);
    }

    public function paginateGetList($where, $page = 1, $limit = 15)
    {
        return $this->customer_repository->paginateGetList($where, $page, $limit);
    }

}