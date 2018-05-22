<?php
namespace App\Http\Controllers;

use App\Service\Application;
/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/11
 * Time: 15:01
 */
class BaseController extends Controller{

    protected $stuff;

    /**
     * @var \App\Service\Application;
     */
    protected $service_application;

    public function __construct()
    {
        $this->service_application = new Application();
        $this->stuff = \JWTAuth::parseToken()->authenticate();
    }

}