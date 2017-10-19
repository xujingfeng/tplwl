<?php 
namespace app\Admin\controller;
use app\Admin\controller\Auth;
use think\Db;
use think\Request;
use think\Session;
class Systemset extends Auth
{
	public function setting()
	{
		return view();
	}
	public function addRole()
	{
		$arr=Db::table('ts_rbac_node')->select();
		return view('addRole',['arr'=>$arr]);
	}
	public function receive(Request $request)
	{
		$data=$request->param();
		dump($data);
		dump($data['yy']);
		dump($data['id']);
		$new=$data['yy']+$data['id'];
		dump($new);
		$str=implode(',',$new);
		echo $str;
	}
	public function userRole()
	{
		$sql="select ts_user.id,user,role_id,role_title from ts_user inner join ts_rbac_role on ts_user.role_id=ts_rbac_role.id";
		$arr=Db::query($sql);
		return view('userRole',['arr'=>$arr]);
	}
}