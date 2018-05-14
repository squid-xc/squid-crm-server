<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 项目表
 * 
 * @property int $id Id
 * @property string $name 名称
 * @property string $short_name 简称
 * @property string $code 编号
 * @property string $description 描述
 * @property string $begin_time 开始时间
 * @property string $end_time 结束时间
 * @property string $participate_department_ids 参与部门ids
 * @property int $charge_department_id 负责部门id
 * @property int $project_type_id 项目类型id
 * @property int $project_stage_id 项目阶段id
 * @property int $charge_person_id 项目负责人
 * @property int $first_level_approval_id 第一级审批
 * @property int $second_level_approval_id 第二级审批
 * @property string $reimbursement_deadline 报销截止时间
 * @property int $estimated_cost 预估成本
 * @property int $close_status 关闭状态 0开启 1关闭
 * @property int $prize 项目奖金
 * @property int $visible_status 可见性 0所有人可见 1部门可见
 * @property int $customer_id 客户id
 * @property string $updated_at 更新时间
 * @property string $created_at 创建时间
 * @property string $deleted_at 删除时间
 */
class Projects extends Model
{
    use SoftDeletes;

    protected $table = 'projects';

    protected $fillable = ['name', 'short_name', 'code', 'description', 'begin_time', 'end_time', 'participate_department_ids', 'charge_department_id', 'project_type_id', 'project_stage_id', 'charge_person_id', 'first_level_approval_id', 'second_level_approval_id', 'reimbursement_deadline', 'estimated_cost', 'close_status', 'prize', 'visible_status', 'customer_id'];

}