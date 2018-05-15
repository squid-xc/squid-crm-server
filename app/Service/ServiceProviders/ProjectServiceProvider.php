<?php
namespace App\Service\ServiceProviders;

use App\Repository\ProjectsRepository;
use App\Repository\ProjectTypesRepository;
use App\Service\ProjectService;
use App\Service\ProjectTypeService;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/14
 * Time: 16:44
 */
class ProjectServiceProvider implements ServiceProviderInterface {

    public function register(Container $pimple)
    {
        $pimple['project_repository'] = function ($pimple){
            return new ProjectsRepository();
        };

        $pimple['project_service'] = function ($pimple){
            $instance = new ProjectService();
            $instance->setProjectRepository($pimple['project_repository']);
            return $instance;
        };

        $pimple['project_type_repository'] = function ($pimple){
            return new ProjectTypesRepository();
        };

        $pimple['project_type_service'] = function ($pimple){
            $instance = new ProjectTypeService();
            $instance->setProjectTypesRepository($pimple['project_type_repository']);
            return $instance;
        };

    }

}