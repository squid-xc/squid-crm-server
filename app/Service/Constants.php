<?php
namespace App\Service;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/14
 * Time: 15:33
 */
class Constants{

    const USER_PASSWORD_SALT = 'E1mUVnPwGoCcQ9k4';

    //角色模块
    const MODULE_ROLE = 1;
    //部门模块
    const MODULE_DEPARTMENT = 2;
    //职位模块
    const MODULE_DUTY = 3;
    //员工模块
    const MODULE_STUFF = 4;
    //供应商模块
    const MODULE_SUPPLIER = 5;
    //出差模块
    const MODULE_BUSINESS_TRAVEL = 6;
    //付款账号
    const MODULE_PAYMENT_ACCOUNT = 7;
    //项目管理
    const MODULE_PROJECT_MANAGEMENT = 8;
    //审批流程
    const MODULE_APPROVAL_PROCESS = 9;
    //货币汇率
    const MODULE_CURRENCY_RATE = 10;
    //支付方式
    const MODULE_PAYMENT_METHOD = 11;
    //付款科目
    const MODULE_COST_SUBJECT = 12;

    public static function module_options(){
        return [
            self::MODULE_ROLE,
            self::MODULE_DEPARTMENT,
            self::MODULE_DUTY,
            self::MODULE_STUFF,
            self::MODULE_SUPPLIER,
            self::MODULE_BUSINESS_TRAVEL,
            self::MODULE_PAYMENT_ACCOUNT,
            self::MODULE_PROJECT_MANAGEMENT,
            self::MODULE_APPROVAL_PROCESS,
            self::MODULE_CURRENCY_RATE,
            self::MODULE_PAYMENT_METHOD,
            self::MODULE_COST_SUBJECT,
        ];
    }

    public static function convert_module($module){
        switch ($module){
            case self::MODULE_ROLE:
                return '角色权限';
                break;
            case self::MODULE_DEPARTMENT:
                return '部门管理';
                break;
            case self::MODULE_DUTY:
                return '职位管理';
                break;
            case self::MODULE_STUFF:
                return '员工管理';
                break;
            case self::MODULE_SUPPLIER:
                return '供应商管理';
                break;
            case self::MODULE_BUSINESS_TRAVEL:
                return '出差地点';
                break;
            case self::MODULE_PAYMENT_ACCOUNT:
                return '付款账号';
                break;
            case self::MODULE_PROJECT_MANAGEMENT:
                return '项目管理';
                break;
            case self::MODULE_APPROVAL_PROCESS:
                return '审批流程';
                break;
            case self::MODULE_CURRENCY_RATE:
                return '币种汇率';
                break;
            case self::MODULE_PAYMENT_METHOD:
                return '支付方式';
                break;
            case self::MODULE_COST_SUBJECT:
                return '费用科目';
                break;
            default:
                return '';
                break;
        }
    }


    //操作类型-新增
    const OPERATION_TYPE_ADD = 1;
    //操作类型-修改
    const OPERATION_TYPE_UPDATE = 2;
    //操作类型-查询
    const OPERATION_TYPE_QUERY = 3;
    //操作类型-删除
    const OPERATION_TYPE_DELETE = 4;


    //客户性质-国有企业
    const CUSTOMER_PROPERTY_GY = 1;
    //客户性质-外资企业
    const CUSTOMER_PROPERTY_WZ = 2;
    //客户性质-民营企业
    const CUSTOMER_PROPERTY_MY = 3;
    //客户性质-集体企业
    const CUSTOMER_PROPERTY_JT = 4;
    //客户性质-股份制企业
    const CUSTOMER_PROPERTY_GFZ = 5;
    //客户性质-合资企业
    const CUSTOMER_PROPERTY_HZ = 6;
    //客户性质-独资企业
    const CUSTOMER_PROPERTY_DZ = 7;
    //客户性质-其他
    const CUSTOMER_PROPERTY_OTHER = 20;


    public static function convert_customer_property($customer_property){
        switch ($customer_property){
            case self::CUSTOMER_PROPERTY_GY:
                return '国有企业';
                break;
            case self::CUSTOMER_PROPERTY_WZ:
                return '外资企业';
                break;
            case self::CUSTOMER_PROPERTY_MY:
                return '民营企业';
                break;
            case self::CUSTOMER_PROPERTY_JT:
                return '集体企业';
                break;
            case self::CUSTOMER_PROPERTY_GFZ:
                return '股份制企业';
                break;
            case self::CUSTOMER_PROPERTY_HZ:
                return '合资企业';
                break;
            case self::CUSTOMER_PROPERTY_DZ:
                return '独资企业';
                break;
            case self::CUSTOMER_PROPERTY_OTHER:
                return '其他';
                break;
            default:
                return '';
                break;
        }
    }

    public static function is_customer_property_valid($customer_property){
        $valid_properties = [
            self::CUSTOMER_PROPERTY_GY,
            self::CUSTOMER_PROPERTY_WZ,
            self::CUSTOMER_PROPERTY_MY,
            self::CUSTOMER_PROPERTY_JT,
            self::CUSTOMER_PROPERTY_GFZ,
            self::CUSTOMER_PROPERTY_HZ,
            self::CUSTOMER_PROPERTY_DZ,
            self::CUSTOMER_PROPERTY_OTHER
        ];
        if(in_array($customer_property,$valid_properties)){
            return true;
        }
        return false;
    }


    //客户状态-潜在
    const CUSTOMER_STATUS_QZ = 1;
    //客户状态-有意向
    const CUSTOMER_STATUS_YYX = 2;
    //客户状态-失败
    const CUSTOMER_STATUS_FAIL = 3;
    //客户状态-已成交
    const CUSTOMER_STATUS_YCJ = 4;
    //客户状态-老客户
    const CUSTOMER_STATUS_OLD = 5;

    public static function convert_customer_status($customer_status){
        switch ($customer_status){
            case self::CUSTOMER_STATUS_QZ:
                return '潜在';
                break;
            case self::CUSTOMER_STATUS_YYX:
                return '有意向';
                break;
            case self::CUSTOMER_STATUS_FAIL:
                return '失败';
                break;
            case self::CUSTOMER_STATUS_YCJ:
                return '已成交';
                break;
            case self::CUSTOMER_STATUS_OLD:
                return '老客户';
                break;
            default:
                return '';
                break;
        }
    }

    //电话来访
    const CUSTOMER_SOURCE_DHLF = 1;
    //老客户
    const CUSTOMER_SOURCE_LKH = 2;
    //客户介绍
    const CUSTOMER_SOURCE_KFJS = 3;
    //独立开发
    const CUSTOMER_SOURCE_DLKF = 4;
    //媒体宣传
    const CUSTOMER_SOURCE_MTXC = 5;
    //促销活动
    const CUSTOMER_SOURCE_CXHD = 6;
    //代理商
    const CUSTOMER_SOURCE_DLS = 7;
    //合作伙伴
    const CUSTOMER_SOURCE_HZHB = 8;
    //公开招标
    const CUSTOMER_SOURCE_GKZB = 9;
    //直邮
    const CUSTOMER_SOURCE_ZY = 10;
    //邮件群发
    const CUSTOMER_SOURCE_YJQF = 11;
    //网站
    const CUSTOMER_SOURCE_WZ = 12;
    //会议
    const CUSTOMER_SOURCE_HY = 13;
    //展会
    const CUSTOMER_SOURCE_ZH = 14;
    //口碑
    const CUSTOMER_SOURCE_KB = 15;
    //其他
    const CUSTOMER_SOURCE_OTHER = 25;

    public static function convert_customer_source($customer_source){
        switch ($customer_source){
            case self::CUSTOMER_SOURCE_DHLF:
                return '电话来访';
                break;
            case self::CUSTOMER_SOURCE_LKH:
                return '老客户';
                break;
            case self::CUSTOMER_SOURCE_KFJS:
                return '客户介绍';
                break;
            case self::CUSTOMER_SOURCE_DLKF:
                return '独立开发';
                break;
            case self::CUSTOMER_SOURCE_MTXC:
                return '媒体宣传';
                break;
            case self::CUSTOMER_SOURCE_CXHD:
                return '促销活动';
                break;
            case self::CUSTOMER_SOURCE_DLS:
                return '代理商';
                break;
            case self::CUSTOMER_SOURCE_HZHB:
                return '合作伙伴';
                break;
            case self::CUSTOMER_SOURCE_GKZB:
                return '公开商标';
                break;
            case self::CUSTOMER_SOURCE_ZY:
                return '直邮';
                break;
            case self::CUSTOMER_SOURCE_YJQF:
                return '邮件群发';
                break;
            case self::CUSTOMER_SOURCE_WZ:
                return '网站';
                break;
            case self::CUSTOMER_SOURCE_HY:
                return '会议';
                break;
            case self::CUSTOMER_SOURCE_ZH:
                return '展会';
                break;
            case self::CUSTOMER_SOURCE_KB:
                return '口碑';
                break;
            case self::CUSTOMER_SOURCE_OTHER:
                return '其他';
                break;
            default:
                return '';
                break;
        }
    }





}