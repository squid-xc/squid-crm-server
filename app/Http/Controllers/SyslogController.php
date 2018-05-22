<?php
namespace App\Http\Controllers;
use App\Service\Constants;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/15
 * Time: 16:10
 */
class SyslogController extends BaseController{

    public function index(){
        $page = request('page',1);
        $page_size = request('page_size',10);
        $module_id = request('module_id');
        $from_time = request('from_time');
        $to_time = request('to_time');
        $result = $this->service_application->syslog_service->paginateGetList($page,$page_size,$module_id,$from_time,$to_time)->toArray();
        $modules = Constants::module_options();
        $result['modules'][] = [
            'id' => 0,
            'name' => '所有模块',
        ];
        foreach ($modules as $module){
            $result['modules'][] = [
                'id' => $module,
                'name' => Constants::convert_module($module)
            ];
        }
        return successJsonReturn('',$result);
    }

}