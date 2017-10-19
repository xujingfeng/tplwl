<?php
namespace app\Admin\controller;
use think\Request;
use think\Validate;
use think\Db;
class Index
{
    public function index()
    {
        return '999999999999999999999999999';
    }
    public function login(Request $request)
    {
        if($request->isPost())
        {
        	$data=$request->param();
        	$validate=new Validate([
                'user'=>'require|max:20',
                'pwd'=>'require',
                'captcha|验证码'=>'require|captcha'
        		],['user.require'=>'用户名不能为空','user.max'=>'用户名不能超过20位','pwd.require'=>'密码不能为空']);
        	if(!$validate->batch()->check($data))
        	{
        		$error=$validate->getError();
        		if(!isset($error['user']))
        		{
        			$error['user']='用户名格式正确';
        		}
        		if(!isset($error['pwd']))
        		{
        			$error['pwd']='密码格式正确';
        		}
        		return json_encode($error);
        	}
        	else
        	{
        		$obj=Model('Login');
        		$bool=$obj->yyy($data);
                if($bool)
                {
                    return json_encode(['status'=>1]);
                }
                else
                {
                    return json_encode(['status'=>0]);
                }
        		
        	}
           return;
        	
        }
        return view();
    }
}
