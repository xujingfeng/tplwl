<?php 
namespace app\Admin\controller;
use think\Request;
use think\Db;
use think\Session;
class Auth
{
	public function limits()
	{
		return view();
	}
	//权限判断方法
	public function yanzheng($order)
	{
        $userId=Session::get('userRoleId');
        $role=Db::table('ts_rbac_role')->where(['id'=>$userId])->find();
        $array=$role['node_id'];
        $newarr=explode(',',$array);
        $count=count($newarr);
        for($i=0;$i<$count;$i++)
        {
        	$node[]=Db::table('ts_rbac_node')->field('operation')->where(['id'=>$newarr[$i]])->select();
        	if($node[$i][0]['operation']==$order)
        	{
        		return 1;
        	}
        }
	}
	//测试
	public function urlget(Request $request)
	{
		echo $request->path();
	}
	public function __construct(Request $request)
	{
		$order=$request->path();//获取路由名字
		//echo Session::get('userName');
		//echo '角色id是'.Session::get('userRoleId').'<br>';
		if(!Session::get('userName'))
		{
			echo "<script>window.location.assign('login')</script>";
			//header('location:login');
			return false;
		}
		$num=$this->yanzheng($order);
		if($num==1)
		{
			//echo '有权限';
		}
		else{
			echo "<script>alert('您没有权限，请购买权限');window.history.go(-1);</script>";
			//exit();
			die();
			return false;
		}
	}
}