<?php
namespace App\Service\ServiceProviders;


use App\Repository\CompaniesRepository;
use App\Service\CompanyService;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/14
 * Time: 16:03
 */
class CompanyServiceProvider implements ServiceProviderInterface{

    public function register(Container $pimple)
    {
        $pimple['company_repository'] = function ($pimple){
            return new CompaniesRepository();
        };

        $pimple['company_service'] = function ($pimple){
            $instance = new CompanyService();
            $instance->setCompaniesRepository($pimple['company_repository']);
            return $instance;
        };
    }

}