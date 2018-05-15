<?php
namespace App\Service\ServiceProviders;
use App\Repository\SyslogsRepository;
use App\Service\SyslogService;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/14
 * Time: 16:03
 */
class SyslogServiceProvider implements ServiceProviderInterface{

    public function register(Container $pimple)
    {
        $pimple['syslog_repository'] = function ($pimple){
            return new SyslogsRepository();
        };

        $pimple['syslog_service'] = function ($pimple){
            $instance = new SyslogService();
            $instance->setSyslogsRepository($pimple['syslog_repository']);
            return $instance;
        };
    }

}