<?php

namespace App\Http\Controllers;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/15
 * Time: 14:01
 */
class UserController extends BaseController
{

    public function register()
    {
        $phone = request('phone');
        $password = request('password');
        $confirm_password = request('confirm_password');
        if (empty($phone)) {
            return failJsonReturn(400, '手机号码不能为空');
        }
        if (empty($password)) {
            return failJsonReturn(400, '密码不能为空');
        }
        if (empty($confirm_password)) {
            return failJsonReturn(400, '确认密码不能为空');
        }
        if (!preg_match('/^1[0-9]{10}$/', $phone)) {
            return failJsonReturn(400, '手机号码格式不正确');
        }
        
    }

    public function resetPasswd()
    {

    }

    public function login()
    {
        $phone = request('phone');
        $password = request('password');
        if (empty($phone)) {
            return failJsonReturn(400, '手机号码不能为空');
        }
        if (empty($password)) {
            return failJsonReturn(400, '密码不能为空');
        }
        $stuff_service = $this->service_application->stuff_service;
        $result = $stuff_service->login($phone, $password);
        if (empty($result)) {
            return failJsonReturn(400, '登录失败');
        }
        return successJsonReturn('登录成功', $result);
    }

    public function logout()
    {
        $this->service_application->stuff_service->clearToken();
        return successJsonReturn('注销成功');
    }

}