<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
Route::get('aa','demo/Index/index');
Route::get('aa1','demo/Index/index1');
Route::get('demo1/:id','demo/Index/demo1');//必选路由
Route::get('demo2/[:ss]','demo/Index/demo2');//必选路由
Route::get('demo3','demo/Index/demo3');
Route::get('demoa1','demo/Demo/demo1');
Route::post('demoa2','demo/Demo/demo2');
Route::get('demoa3','demo/Demo/demo3');
Route::get('demoa4','demo/Demo/demo4');
Route::get('bbb','demo/Demo2/bbb');
Route::post('ccc/[:id]','demo/Demo2/ccc');
Route::get('ddd','demo/Demo2/ddd');
Route::get('eee','demo/Demo2/eee');
//Route::get('fff','demo/Demo2/fff');
Route::get('ggg','demo/Demo2/ggg');
Route::get('hhh','demo/Demo2/hhh');
Route::get('iii','demo/Demo2/iii');
Route::get('jjj','demo/Demo2/jjj');
Route::get('kkk','demo/Demo2/kkk');
Route::get('lll','demo/Demo2/lll');
Route::post('mmm','demo/Demo2/mmm');
Route::get('nnn','demo/Demo2/nnn');
Route::get('ooo','demo/Demo2/ooo');
Route::get('ppp','demo/Demo2/ppp');
Route::get('qqq','demo/Demo2/qqq');
Route::get('rrr','demo/Demo2/rrr');
/*Admin模块*/
Route::any('index','Admin/Index/index');
Route::any('login','Admin/Index/login');
Route::get('article','Admin/Article/llll');
//销毁Session
Route::get('tuichu','Admin/Article/tuichu');

Route::get('lista','Admin/Lista/ull');
Route::get('shijian','Admin/Lista/shijian');
Route::get('price','Admin/Lista/price');
Route::get('num','Admin/Lista/num');
Route::get('uptimes','Admin/Lista/uptimes');


Route::any('inserts','Admin/Inserts/inse');
Route::any('assort','Admin/Assort/fenlei');
Route::get('gabage','Admin/Gabage/del');
Route::get('user','Admin/User/vip');
Route::get('auth','Admin/Auth/limits');
Route::get('order','Admin/Order/oms');
Route::get('systemset','Admin/Systemset/setting');
Route::get('addRole','Admin/Systemset/addRole');
Route::get('userRole','Admin/Systemset/userRole');
Route::any('receive','Admin/Systemset/receive');

Route::any('update','Admin/Update/updt');
Route::any('delete','Admin/Lista/del');
Route::any('huanyuan','Admin/Gabage/huanyuan');
Route::any('qingchu','Admin/Gabage/qingchu');
Route::any('chaxun','Admin/Lista/chaxun');
return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
