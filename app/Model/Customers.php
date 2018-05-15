<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 客户表
 * 
 * @property int $id Id
 * @property string $name 名称
 * @property string $code 编号
 * @property int $charge_id 负责人
 * @property string $contact_name 联系人姓名
 * @property string $contact_phone 联系电话
 * @property string $phone 手机
 * @property string $email 邮箱
 * @property int $industry_id 产业id
 * @property int $property_id 性质id
 * @property string $legal_person 法人
 * @property int $province_id 省
 * @property int $city_id 市
 * @property string $stuff_amount 员工数
 * @property string $address 地址
 * @property string $zip_code 邮编
 * @property string $url 网址
 * @property string $fax 传真
 * @property string $description 描述
 * @property int $bank_id 银行id
 * @property string $bank_number 银行账号
 * @property int $source 来源 1、电话来访  2、老客户 3、客户介绍 4、独立开发 5、媒体宣传 6、促销活动 7、代理商 8、合作伙伴 9、公开招标 10、直邮 11、邮件群发 12、网站 13、会议 14、展会 15、口碑 16、其他
 * @property int $status 客户状态 1、潜在 2、有意向 3、失败 4、已成交 5、老客户
 * @property float $rank 星级
 * @property string $next_contact_time 下次联系时间
 * @property int $is_lock 是否锁定 0未锁定 1锁定
 * @property string $remark 备注
 * @property string $updated_at 更新时间
 * @property string $created_at 创建时间
 * @property string $deleted_at 删除时间
 */
class Customers extends Model
{
    use SoftDeletes;

    protected $table = 'customers';

    protected $fillable = ['name', 'code', 'charge_id', 'contact_name', 'contact_phone', 'phone', 'email', 'industry_id', 'property_id', 'legal_person', 'province_id', 'city_id', 'stuff_amount', 'address', 'zip_code', 'url', 'fax', 'description', 'bank_id', 'bank_number', 'source', 'status', 'rank', 'next_contact_time','is_lock', 'remark'];

}