<?php
namespace App\Service\ServiceProviders;
use App\Repository\ContactsRepository;
use App\Service\ContactService;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/14
 * Time: 16:59
 */
class ContactServiceProvider implements ServiceProviderInterface{

    public function register(Container $pimple)
    {
        $pimple['contact_repository'] = function ($pimple){
            return new ContactsRepository();
        };

        $pimple['contact_service'] = function ($pimple){
            $instance = new ContactService();
            $instance->setContactsRepository($pimple['contact_repository']);
            return $instance;
        };
    }

}