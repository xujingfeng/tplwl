<?php
namespace app\Admin\model;
use think\Model;
use think\Db;
class Inse extends Model
{
	protected $table = 'ts_class';

	public function yyy($data='')
	{
         $bool=Db::table('ts_class')->insert($data);
         if($bool){
         	return true;
         }else{
         	return false;
         }

	}
   public function ppp($data='')
   {
         $bool=Db::table('ts_books')->insert($data);
         if($bool){
            return true;
         }else{
            return false;
         }

   }


}