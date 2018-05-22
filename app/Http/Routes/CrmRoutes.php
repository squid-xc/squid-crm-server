<?php
namespace App\Http\Routes;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/11
 * Time: 15:18
 */
class CrmRoutes implements RouteInterface{

    public function map(){
        \Route::group([
            'prefix' => 'user',
        ],function (){
            \Route::post('/login','UserController@login');
            \Route::post('/register','UserController@register');
            \Route::get('/verificationCode','UserController@verificationCode');
        });

        \Route::group([
            'prefix' => 'syslog',
        ],function (){
            \Route::get('/index','SyslogController@index');
        });

        \Route::group([
            'prefix' => 'customer',
            'middleware' => 'refreshToken'
        ],function (){
            \Route::get('/index','CustomerController@index');

        });


    }




}