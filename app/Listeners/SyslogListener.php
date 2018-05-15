<?php
namespace App\Listeners;
use App\Events\SyslogEvent;
use App\Service\Application;
use App\Service\Constants;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/14
 * Time: 15:58
 */
class SyslogListener{

    public function handle(SyslogEvent $event){
        $operation_type = $event->operation_type;
        $stuff_id = $event->stuff_id;
        $module_id = $event->module_id;
        $description = $event->description;

        $application = new Application();
        switch ($operation_type){
            case Constants::OPERATION_TYPE_ADD:
                $application->syslog_service->createForAdd($stuff_id,$module_id,$description);
                break;
            case Constants::OPERATION_TYPE_UPDATE:
                $application->syslog_service->createForUpdate($stuff_id,$module_id,$description);
                break;
            case Constants::OPERATION_TYPE_QUERY:
                $application->syslog_service->createForQuery($stuff_id,$module_id,$description);
                break;
            case Constants::OPERATION_TYPE_DELETE:
                $application->syslog_service->createForDelete($stuff_id,$module_id,$description);
                break;
        }
    }

}