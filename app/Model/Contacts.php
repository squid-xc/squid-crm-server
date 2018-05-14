<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 联系人表
 * 
 * @property int $id Id
 * @property string $name 名称
 * @property int $sex 性别 1、男 2、女
 * @property string $office_phone 办公电话
 * @property string $phone 移动电话
 * @property string $email 邮箱
 * @property int $is_main 是否为主联系人 0不是 1是
 * @property int $customer_id 所属客户id
 * @property string $en_name 英文名
 * @property string $nick_name 昵称
 * @property string $msn msn
 * @property string $qq qq
 * @property string $department 部门
 * @property string $duty 职务
 * @property string $description 描述
 * @property string $birthday 生日
 * @property string $family_phone 家庭电话
 * @property string $address 地址
 * @property string $zip 邮编
 * @property string $remark 备注
 * @property string $updated_at 更新时间
 * @property string $created_at 创建时间
 * @property string $deleted_at 删除时间
 */
class Contacts extends Model
{
    use SoftDeletes;

    protected $table = 'contacts';

    protected $fillable = ['name', 'sex', 'office_phone', 'phone', 'email', 'is_main', 'customer_id', 'en_name', 'nick_name', 'msn', 'qq', 'department', 'duty', 'description', 'birthday', 'family_phone', 'address', 'zip', 'remark'];

}