<?php 
namespace app\Admin\model;
use think\Model;
use think\Db;
class Upp extends Model
{
	protected $table = 'ts_books';
    public function yyy($data='')
	{
         $bool=Db::table('ts_books')->insert($data);
         if($bool){
         	return true;
         }else{
         	return false;
         }

	}

}