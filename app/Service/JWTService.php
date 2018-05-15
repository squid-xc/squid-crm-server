<?php

namespace App\Service;

use Firebase\JWT\JWT;

class JWTService
{
    /**
     * 生成JWT
     * @param array $data 用户数据
     * @param null|int $expire 有效期（单位：秒）
     * @return string
     * @throws \ErrorException
     */
    public static function encode(array $data, $expire = null)
    {
        $data['iat'] = time();//签发时间
        if ($expire) {
            $data['exp'] = $data['iat'] + $expire;
        }

        $config = self::getConfig();
        $encode_key = $config['encode_key'];
        $alg = $config['alg'];

        return JWT::encode($data, $encode_key, $alg);
    }

    /**
     * 获取配置
     * @return array
     * @throws \ErrorException
     */
    private static function getConfig()
    {
        if (config('jwt.alg') == 'HS256') {
            return [
                'alg' => 'HS256',
                'encode_key' => config('jwt.key'),
                'decode_key' => config('jwt.key'),
            ];
        } elseif (config('jwt.alg') == 'RS256') {
            return [
                'alg' => 'RS256',
                'encode_key' => config('jwt.private_key'),
                'decode_key' => config('jwt.public_key'),
            ];
        } else {
            throw new \ErrorException('暂不支持的加密方式');
        }
    }

    /**
     * 解码JWT
     * @param string $data
     * @param null|string $alg 加密方式
     * @param null|string $decode_key 解密key
     * @return bool|array
     */
    public static function decode($data)
    {
        $config = self::getConfig();
        $decode_key = $config['decode_key'];
        $alg = $config['alg'];

        try {
            return (array)JWT::decode($data, $decode_key, [$alg]);
        } catch (\Exception $e) {
            return false;
        }
    }
}