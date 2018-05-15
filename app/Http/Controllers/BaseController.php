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

    protected $stuff_id;

    protected $stuff;

    /**
     * @var \App\Service\Application;
     */
    protected $service_application;

    public function __construct()
    {
        $this->service_application = new Application();

        $stuff_service = $this->service_application->stuff_service;
        $this->stuff_id = $stuff_service->getCurrentStuffID();
        if(!empty($this->stuff_id)){
            $this->stuff = $stuff_service->get($this->stuff_id);
        }
    }

}