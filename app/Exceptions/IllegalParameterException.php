<?php

namespace App\Exceptions;

class IllegalParameterException extends \Exception {

    protected $code;
    protected $msg;
    protected $data = '';

    public function __construct($code,$msg,$data = '') {
        $this->code = $code;
        $this->msg = $msg;
        $this->data = $data;
    }

    public function getMsg(){
        return $this->msg;
    }

    public function getErrorCode(){
        return $this->code;
    }

    public function getData(){
        return $this->data;
    }

}