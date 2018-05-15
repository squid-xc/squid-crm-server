<?php
namespace App\Service\ServiceProviders;
use App\Repository\IndustriesRepository;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/15
 * Time: 11:19
 */
class IndustryServiceProvider implements ServiceProviderInterface {

    public function register(Container $pimple)
    {
        $pimple['industry_repository'] = function (){
            return new IndustriesRepository();
        };
    }

}