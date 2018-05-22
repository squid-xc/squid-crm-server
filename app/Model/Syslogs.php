<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 系统日志表
 * 
 * @property int $id Id
 * @property string $access_at 访问时间
 * @property int $stuff_id 员工id
 * @property int $module_id 模块id
 * @property int $operation_type 操作类型
 * @property string $description 描述
 * @property string $updated_at 更新时间
 * @property string $created_at 创建时间
 * @property string $deleted_at 删除时间
 */
class Syslogs extends Model
{
    use SoftDeletes;

    protected $table = 'syslogs';

    protected $fillable = ['access_at', 'stuff_id', 'module_id', 'operation_type', 'description'];

    public function stuff(){
        return $this->belongsTo(Stuff::class,'stuff_id');
    }




}