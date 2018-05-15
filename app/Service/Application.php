<?php
namespace App\Service;

use Pimple\Container;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/11
 * Time: 16:06
 */

/**
 * Class Application
 * @property \App\Service\CustomerService $customer_service
 * @property \App\Repository\CustomersRepository $customer_repository
 * @property \App\Repository\IndustriesRepository $industry_repository
 * @property \App\Service\SyslogService $syslog_service
 * @property \App\Service\DutyService $duty_service
 * @property \App\Service\CompanyService $company_service
 * @property \App\Service\ProjectService $project_service
 * @property \App\Service\StuffService $stuff_service
 * @property \App\Service\ContactService $contact_service
 */
class Application extends Container{

    public function __construct()
    {
        parent::__construct();
        $this->registerProviders();
    }

    protected $providers = [
        ServiceProviders\CustomerServiceProvider::class,
        ServiceProviders\SyslogServiceProvider::class,
        ServiceProviders\DutyServiceProvider::class,
        ServiceProviders\CompanyServiceProvider::class,
        ServiceProviders\ProjectServiceProvider::class,
        ServiceProviders\StuffServiceProvider::class,
        ServiceProviders\ContactServiceProvider::class,
        ServiceProviders\IndustryServiceProvider::class,
    ];

    public function addProvider($provider){
        array_push($this->providers,$provider);
        return $this;
    }

    public function setProviders($providers){
        $this->providers = [];
        foreach ($providers as $provider){
            $this->addProvider($provider);
        }
    }

    public function getProviders(){
        return $this->providers;
    }

    public function __get($id){
        return $this->offsetGet($id);
    }

    public function __set($id,$value){
        $this->offsetSet($id,$value);
    }

    public function registerProviders(){
        foreach ($this->providers as $provider){
            $this->register(new $provider());
        }
    }

}