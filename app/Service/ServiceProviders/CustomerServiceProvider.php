<?php
namespace App\Service\ServiceProviders;
use App\Repository\CustomersRepository;
use App\Service\CustomerService;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/11
 * Time: 16:09
 */
class CustomerServiceProvider implements ServiceProviderInterface {

    public function register(Container $pimple)
    {
        $pimple['customer_repository'] = function ($pimple){
            return new CustomersRepository();
        };

        $pimple['customer_service'] = function ($pimple){
            $instance = new CustomerService();
            $instance->setCustomerRepository($pimple['customer_repository']);
            $instance->setIndustryRepository($pimple['industry_repository']);
            return $instance;
        };
    }

}