<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 行业表
 * 
 * @property int $id Id
 * @property string $name 行业名称
 * @property int $sort 排序
 * @property string $updated_at 更新时间
 * @property string $created_at 创建时间
 * @property string $deleted_at 删除时间
 */
class Industries extends Model
{
    use SoftDeletes;

    protected $table = 'industries';

    protected $fillable = ['name', 'sort'];

}