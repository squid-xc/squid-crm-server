<?php
namespace App\Http\Routes;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/5/11
 * Time: 15:18
 */
class CustomerRoutes implements RouteInterface{

    public function map(){
        \Route::group([
            'prefix' => 'customer',
        ],function (){
            \Route::get('/index','CustomerController@index');

        });
    }

}