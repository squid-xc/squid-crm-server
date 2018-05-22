<?php
namespace App\Repository;
use App\Service\Constants;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/14
 * Time: 15:45
 */
class SyslogsRepository extends Repository{

    private $valid_module_ids = [
        Constants::MODULE_ROLE,
        Constants::MODULE_DEPARTMENT,
        Constants::MODULE_DUTY,
        Constants::MODULE_STUFF,
        Constants::MODULE_SUPPLIER,
        Constants::MODULE_BUSINESS_TRAVEL,
        Constants::MODULE_PAYMENT_ACCOUNT,
        Constants::MODULE_PROJECT_MANAGEMENT,
        Constants::MODULE_APPROVAL_PROCESS,
        Constants::MODULE_CURRENCY_RATE,
        Constants::MODULE_PAYMENT_METHOD,
        Constants::MODULE_COST_SUBJECT
    ];

    public function createForAdd($stuff_id,$module_id,$description){
        $stuff_id = intval($stuff_id);
        $module_id = intval($module_id);
        if(empty($stuff_id) || !in_array($module_id,$this->valid_module_ids)){
            return false;
        }

        $entry = [
            'stuff_id' => $stuff_id,
            'module_id' => $module_id,
            'operation_type' => Constants::OPERATION_TYPE_ADD,
            'description' => $description,
        ];
        return $this->create($entry);
    }

    public function createForUpdate($stuff_id,$module_id,$description){
        $stuff_id = intval($stuff_id);
        $module_id = intval($module_id);
        if(empty($stuff_id) || !in_array($module_id,$this->valid_module_ids)){
            return false;
        }

        $entry = [
            'stuff_id' => $stuff_id,
            'module_id' => $module_id,
            'operation_type' => Constants::OPERATION_TYPE_UPDATE,
            'description' => $description,
        ];
        return $this->create($entry);
    }

    public function createForQuery($stuff_id,$module_id,$description){
        $stuff_id = intval($stuff_id);
        $module_id = intval($module_id);
        if(empty($stuff_id) || !in_array($module_id,$this->valid_module_ids)){
            return false;
        }

        $entry = [
            'stuff_id' => $stuff_id,
            'module_id' => $module_id,
            'operation_type' => Constants::OPERATION_TYPE_QUERY,
            'description' => $description,
        ];
        return $this->create($entry);
    }

    public function createForDelete($stuff_id,$module_id,$description){
        $stuff_id = intval($stuff_id);
        $module_id = intval($module_id);
        if(empty($stuff_id) || !in_array($module_id,$this->valid_module_ids)){
            return false;
        }

        $entry = [
            'stuff_id' => $stuff_id,
            'module_id' => $module_id,
            'operation_type' => Constants::OPERATION_TYPE_DELETE,
            'description' => $description,
        ];
        return $this->create($entry);
    }

    public function paginateGetList($page,$limit,$module_id,$from_time,$to_time){
        $page = intval($page);
        $limit = intval($limit);
        if(empty($page) || empty($limit)){
            return [];
        }
        $where = [];
        if(empty($from_time) && empty($to_time) && empty($module_id)){
            $where = [
                'deleted_at' => NULL,
            ];
        }

        if(!empty($module_id)){
            $where['module_id'] = $module_id;
        }

        $query = $this->model::where($where);
        if(!empty($from_time)){
            $from_time = date('Y-m-d 0:0:0',strtotime($from_time));
            $query->where('access_at','>=',$from_time);
        }
        if(!empty($to_time)){
            $to_time = date('Y-m-d 0:0:0',strtotime($to_time,'+1 day'));
            $query->where('access_at','<',$to_time);
        }
        $entries = $query->select(['*'])->orderBy('created_at','desc')->with([
            'stuff' => function($query){
                  $query->select(['id','name']);
            },
        ])->paginate($limit,['*'],'page',$page);
        foreach ($entries as $entry){
            $entry['module'] = [
                'module_id' => $entry['module_id'],
                'name' => Constants::convert_module($entry['module_id']),
            ];
        }
        return $entries;
    }

}