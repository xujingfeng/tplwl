<?php 
namespace app\Admin\model;
use think\Model;
use think\Db;
use think\Session;
class Login extends Model
{
	public function yyy($arr='')
	{
		$user=$arr['user'];
		$pwd=$arr['pwd'];
		
        $array=Db::table('ts_user')->where(['user'=>$user])->find();
        if($array)
        {
        	if($array['pwd']==md5($pwd))
	        {
	        	Session::set('userRoleId',$array['role_id']);
	        	Session::set('userId',$array['id']);
	        	Session::set('userName',$array['user']);
	        	 return true;
	        }else{
	        	return false;
	        }
        }else{
        	return false;
        }
	}
}