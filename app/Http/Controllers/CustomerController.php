<?php
namespace App\Http\Controllers;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/11
 * Time: 15:02
 */
class CustomerController extends BaseController{

    public function index(){
        $customer = $this->service_application->customer_service;

        $res = $customer->create("阿三");
        dd($res);
    }

}