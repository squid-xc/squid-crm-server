<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 职务表
 * 
 * @property int $id Id
 * @property string $name 名称
 * @property string $description 描述
 * @property string $updated_at 更新时间
 * @property string $created_at 创建时间
 * @property string $deleted_at 删除时间
 */
class Duties extends Model
{
    use SoftDeletes;

    protected $table = 'duties';

    protected $fillable = ['name', 'description'];

}