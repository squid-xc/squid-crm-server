<?php
namespace App\Events;

use Illuminate\Queue\SerializesModels;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/14
 * Time: 15:53
 */
class SyslogEvent extends Event{
    use SerializesModels;

    public $stuff_id;

    public $module_id;

    public $description;

    public $operation_type;

    public function __construct($operation_type,$stuff_id,$module_id,$description = '')
    {
        $this->operation_type = $operation_type;
        $this->stuff_id = $stuff_id;
        $this->module_id = $module_id;
        $this->description = $description;
    }

    public function broadcastOn()
    {
        return [];
    }

}