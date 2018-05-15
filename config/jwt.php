<?php
/**
 * 用于JWT
 */
return [
    /*
     * 加密方式
     * JWT支持很多种加密方式，由于类库限制，建议在HS256和RS256中选一个
     */
    'alg' => 'HS256',

    /*
     * 密钥（当加密方式为HS256时需要设置）
     * **非常重要，app中请务必重新设置一个**
     */
    'key' => '9by9Pkn3tdFQzjuN',

    /*
     * 私钥（当加密方式为RS256时需要设置）
     */
    'private_key' => '',

    /*
     * 公钥（当加密方式为RS256时需要设置）
     */
    'public_key' => '',
];