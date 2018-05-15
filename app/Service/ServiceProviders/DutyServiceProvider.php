<?php
namespace App\Service\ServiceProviders;

use App\Repository\DutiesRepository;
use App\Service\DutyService;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/14
 * Time: 16:03
 */
class DutyServiceProvider implements ServiceProviderInterface{

    public function register(Container $pimple)
    {
        $pimple['duty_repository'] = function ($pimple){
            return new DutiesRepository();
        };

        $pimple['duty_service'] = function ($pimple){
            $instance = new DutyService();
            $instance->setDutiesRepository($pimple['duty_repository']);
            return $instance;
        };
    }

}