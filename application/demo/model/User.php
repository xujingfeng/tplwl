<?php
namespace app\demo\model;
use think\Model;
use think\Db;
class User extends Model
{
	protected $table = 'user';

	public function yyy($data='')
	{
         $bool=Db::table('user')->insert($data);
         if($bool){
         	return true;
         }else{
         	return false;
         }

	}


}