<?php
namespace app\Admin\controller;
use think\Request;
use think\Validate;
use think\Session;
use app\Admin\controller\Auth;
class Article extends Auth
{
	public function llll()
	{
		$user=Session::get('userName');
		return view('llll',['user'=>$user]);
	}
	public function tuichu()
	{
		Session::delete('userRoleId');
		Session::delete('userName');
		Session::delete('userId');
		echo "<script>window.location.assign('login')</script>";
	}
}