<?php
namespace App\Service\ServiceProviders;
use App\Repository\StuffRepository;
use App\Service\StuffService;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/14
 * Time: 16:57
 */
class StuffServiceProvider implements ServiceProviderInterface{

    public function register(Container $pimple)
    {
        $pimple['stuff_repository'] = function ($pimple){
            return new StuffRepository();
        };

        $pimple['stuff_service'] = function ($pimple){
            $instance = new StuffService();
            $instance->setStuffRepository($pimple['stuff_repository']);
            return $instance;
        };
    }

}