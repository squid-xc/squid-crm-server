<?php

/**
 * 获取错误代码对应的提示信息
 * @param: $code   int  错误代码
 * @return:  string
 */
function codeInfo($code){
    $codeInfo = array(
        100 => '未登录',
        125 => '账号错误',
        130 => '密码错误',
        200 => '成功',
        400 => '参数错误',
        160 => '此账号禁止登陆',
        401 => '未认证',
        404 => '未找到',
        900=>'未注册',
        901=>'不支持'
    );
    if($codeInfo[$code]){
        return $codeInfo[$code];
    }else{
        return '';
    }

}

/**
 * json成功返回数据
 * @param string $msg
 * @param array $data
 */
function successJsonReturn($msg = "",$data = array()){
    $data = (object)$data;
    echo json_encode(array(
        "code" => 200,
        "msg" => $msg ? $msg : '成功',
        "data" => $data,
    ));exit;
}


/**
 * json成功返回数据
 * @param string $msg
 * @param array $data
 */
function failJsonReturn($code = 400,$msg = "",$data = array()){
    $data = (object)$data;
    echo json_encode(array(
        "code" => $code,
        "msg" => $msg ? $msg : codeInfo($code),
        "data" => $data,
    ));exit;
}