<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 部门表
 * 
 * @property int $id Id
 * @property string $name 部门名称
 * @property string $code 部门编号
 * @property string $description 部门描述
 * @property int $manager_id 部门经理
 * @property int $bill_share_id 单据共享人
 * @property string $updated_at 更新时间
 * @property string $created_at 创建时间
 * @property string $deleted_at 删除时间
 */
class Departments extends Model
{
    use SoftDeletes;

    protected $table = 'departments';

    protected $fillable = ['name', 'code', 'description', 'manager_id', 'bill_share_id'];

}