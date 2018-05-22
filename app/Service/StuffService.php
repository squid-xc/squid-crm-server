<?php

namespace App\Service;

use App\Exceptions\IllegalParameterException;
use App\Helpers\ArrayHelper;
use App\Repository\StuffRepository;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/14
 * Time: 16:51
 */
class StuffService
{

    /**
     * token有效时间30分钟
     */
    const STUFF_LOGIN_EXPIRETIME = 1800;

    const STUFF_TOKEN_KEY = 'token_stuff';

    /**
     * @var StuffRepository
     */
    private $stuff_repository;

    public function setStuffRepository(StuffRepository $stuffRepository)
    {
        $this->stuff_repository = $stuffRepository;
        return $this;
    }

    public function get($id)
    {
        $id = intval($id);
        if (empty($id)) {
            return false;
        }
        return $this->stuff_repository->get($id);
    }

    public function create($entity)
    {
        if (!is_array($entity) || empty($entity)) {
            return false;
        }
        return $this->stuff_repository->create($entity);
    }

    public function update($id, $entity)
    {
        $id = intval($id);
        if (empty($id) || !is_array($entity) || empty($entity)) {
            return false;
        }

        return $this->stuff_repository->update($id, $entity);
    }

    public function delete($id)
    {
        if (empty($id)) {
            return false;
        }
        return $this->stuff_repository->delete($id);
    }

    public function paginateGetList($where, $page = 1, $limit = 15)
    {
        return $this->stuff_repository->paginateGetList($where, $page, $limit);
    }

    public function register($phone,$password){
        if(empty($phone) || empty($password)){
            return false;
        }

        $where = [
            'phone' => $phone,
        ];
        $entry = $this->stuff_repository->getOne($where);
        if(!empty($entry)){
            throw new IllegalParameterException(400,'该手机号码已注册，请直接登录');
        }

        $new_entry = [
            'phone' => $phone,
            'password' => md5($password.Constants::USER_PASSWORD_SALT),
            'name' => '用户'.$phone,
        ];
        return $this->stuff_repository->create($new_entry);
    }

    public function login($phone, $password)
    {
        if (empty($phone) || empty($password)) {
            return false;
        }

        $where = [
            'phone' => $phone,
            'password' => md5($password . Constants::USER_PASSWORD_SALT),
        ];
        $entry = $this->stuff_repository->getOne($where);
        if(empty($entry)){
            throw new IllegalParameterException(400,'用户名或密码不正确');
        }
        $entry = $entry->toArray();

        $data = [
            'stuff_id' => $entry['id'],
        ];
        $token = JWTService::encode($data,self::STUFF_LOGIN_EXPIRETIME);
        if(empty($token)){
            throw new IllegalParameterException(400,'登录失败');
        }

        \Cookie::queue(
            self::STUFF_TOKEN_KEY,
            $token,
            self::STUFF_LOGIN_EXPIRETIME / 60
        );

        return ArrayHelper::only($entry,[
            'id',
            'name',
            'avatar',
            'job_number',
            'description',
            'phone'
        ]);
    }

    /**
     * 获取当前登录的stuff_id
     * @return int
     */
    public function getCurrentStuffID()
    {
        static $stuff_id;

        if ($stuff_id === null) {
            //尝试从cookie中获取token
            $token = \Cookie::get(self::STUFF_TOKEN_KEY);

            if (!$token) {
                //没有获取到token，直接返回0
                $stuff_id = 0;
            }
            if (!$token_data = JWTService::decode($token)) {
                //获取到token，但token无效（由于laravel本身有一层加密机制在，这种情况基本上是token过期）

                //清掉cookie
                \Cookie::queue(\Cookie::forget(self::STUFF_TOKEN_KEY));

                $stuff_id = 0;
            }

            $stuff_id = isset($token_data['stuff_id']) ? $token_data['stuff_id'] : 0;
        }

        return $stuff_id;
    }

    public function refreshToken(){
        if ($stuff_id = self::getCurrentStuffID()) {
            $token = JWTService::encode([
                'stuff_id' => $stuff_id,
            ], self::STUFF_LOGIN_EXPIRETIME);

            \Cookie::queue(
                self::STUFF_TOKEN_KEY,
                $token,
                self::STUFF_LOGIN_EXPIRETIME / 60
            );
        }
        return true;
    }

    public function clearToken(){
        \Cookie::forget(self::STUFF_TOKEN_KEY);
        return true;
    }

}