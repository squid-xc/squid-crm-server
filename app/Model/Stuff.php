<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 员工表
 * 
 * @property int $id Id
 * @property string $name 名称
 * @property int $avatar 头像
 * @property string $job_number 工号
 * @property string $description 描述
 * @property string $login_name 登录名
 * @property string $password 密码
 * @property string $encrypt 加密字符
 * @property string $email 邮箱
 * @property string $phone 手机号
 * @property int $department_id 部门id
 * @property int $duty_id 职务id
 * @property int $role_id 角色id
 * @property int $bank_id 银行id
 * @property string $bank_number 银行账号
 * @property string $opening_bank 开户行
 * @property int $province_id 省
 * @property int $city 市
 * @property string $area_code 区号
 * @property int $type 员工类型 1、合同制员工 2、兼职 3、实习 4、外包人员 5、中介公司劳务派遣
 * @property int $source 员工来源 1、分公司调入 2、内部推荐 3、社会招聘 4、应届毕业生
 * @property string $entry_time 入职时间
 * @property string $updated_at 更新时间
 * @property string $created_at 创建时间
 * @property string $deleted_at 删除时间
 */
class Stuff extends Model
{
    use SoftDeletes;

    protected $table = 'stuff';

    protected $fillable = ['name','avatar', 'job_number', 'description', 'login_name', 'password', 'encrypt', 'email', 'phone', 'department_id', 'duty_id', 'role_id', 'bank_id', 'bank_number', 'opening_bank', 'province_id', 'city', 'area_code', 'type', 'source', 'entry_time'];

    protected $hidden = ['password'];

}