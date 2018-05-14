<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 项目类型表
 * 
 * @property int $id Id
 * @property string $name 名称
 * @property string $description 描述
 * @property string $updated_at 更新时间
 * @property string $created_at 创建时间
 * @property string $deleted_at 删除时间
 */
class ProjectTypes extends Model
{
    use SoftDeletes;

    protected $table = 'project_types';

    protected $fillable = ['name', 'description'];

}