<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\UserController;
use App\Admin\Controllers\BaiThiController;
use App\Admin\Controllers\CauHoiController;
use App\Admin\Controllers\cauhoibaithiController;
use App\Admin\Controllers\LoaiLyThuyetController;
use App\Admin\Controllers\LyThuyetController;
use App\Admin\Controllers\userbaithiController;
use App\Admin\Controllers\AddCauHoiController;
use App\Admin\Controllers\BienBaoController;
use App\Admin\Controllers\MeoThiController;

use App\Admin\Controllers\LoaiMeoThiController;
use App\Admin\Controllers\LoaiBienBaoController;
Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    
    $router->resource('database/user', 'UserController');
    $router->resource('database/baithi', 'BaiThiController');
    $router->resource('database/cauhoi', 'CauHoiController');  
    $router->resource('database/loailythuyet', 'LoaiLyThuyetController');
    $router->resource('database/lythuyet', 'LyThuyetController');
    $router->resource('database/userbaithi', 'userbaithiController'); // không dùng kiểu này
    $router->resource('database/cauhoibaithi', 'cauhoibaithiController');// không dùng kiểu này
    $router->resource('database/baithi/{id}/addcauhoi', 'AddCauHoiController');
    $router->resource('database/bienbao', 'BienBaoController');  
    $router->resource('database/meothi', 'MeoThiController');  
    $router->resource('database/loaibienbao', 'LoaiBienBaoController');  
    
    $router->resource('database/loaimeothi', 'LoaiMeoThiController');   
    //$router->resource('database/insertCHBTList', 'BaiThiController');
});
