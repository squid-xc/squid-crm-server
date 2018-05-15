<?php

namespace App\Http\Controllers;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/11
 * Time: 15:02
 */
class CustomerController extends BaseController
{

    public function index()
    {
        $page = request('page', 1);
        $page_size = request('page_size', 15);
        $where = [
            'deleted_at' => NULL
        ];
        $data = $this->service_application->customer_service->paginateGetList($where, $page, $page_size);
        return successJsonReturn("", $data);
    }

    public function delete()
    {
        $ids = json_decode(request('ids'), true);
        if (empty($ids)) {
            return failJsonReturn(400, '请选择要删除的数据');
        }
        $result = $this->service_application->customer_service->delete($ids);
        if (empty($result)) {
            return failJsonReturn(400, "删除失败");
        }
        return successJsonReturn("删除成功");
    }

    public function edit()
    {
        $id = request('id');
        if (empty($id)) {
            return failJsonReturn(400, '未选择记录');
        }
        $result = $this->service_application->customer_service->get($id);
        if (empty($result)) {
            return failJsonReturn(400, '找不到记录');
        }
        return successJsonReturn('', $result);
    }

    public function update()
    {
        $id = request('id');
        $name = request('name');
        $code = request('code');
        $charge_id = request('charge_id');
        $contact_name = request('contact_name');
        $contact_phone = request('contact_phone');
        $phone = request('phone');
        $email = request('email');
        if (empty($name)) {
            return failJsonReturn(400, '客户名称不能为空');
        }
        if (empty($contact_name)) {
            return failJsonReturn(400, '联系人姓名不能为空');
        }
        if (empty($contact_phone)) {
            return failJsonReturn(400, '联系电话不能为空');
        }
        $industry_id = request('industry_id');
        $property_id = request('property_id');
        $legal_person = request('legal_person');
        $province_id = request('province_id');
        $city_id = request('city_id');
        $stuff_amount = request('stuff_amount');
        $address = request('address');
        $zip_code = request('zip_code');
        $url = request('url');
        $fax = request('fax');
        $description = request('description');
        $bank_id = request('bank_id');
        $bank_number = request('bank_number');
        $source = request('source');
        $status = request('status');
        $rank = request('rank');
        $next_contact_time = request('next_contact_time');
        $remark = request('remark');
        if (empty($id)) {
            $result = $this->service_application->customer_service->create($name, $code, $charge_id, $contact_name, $contact_phone, $phone, $email, $industry_id, $property_id, $legal_person, $province_id, $city_id, $stuff_amount, $address, $zip_code, $url, $fax, $description, $bank_id, $bank_number, $source, $status, $rank, $next_contact_time, $remark);
        } else {
            $result = $this->service_application->customer_service->update($id, $name, $code, $charge_id, $contact_name, $contact_phone, $phone, $email, $industry_id, $property_id, $legal_person, $province_id, $city_id, $stuff_amount, $address, $zip_code, $url, $fax, $description, $bank_id, $bank_number, $source, $status, $rank, $next_contact_time, $remark);
        }

        if (empty($result)) {
            return failJsonReturn(400, '保存失败');
        }
        return successJsonReturn('保存成功', $result);
    }

}