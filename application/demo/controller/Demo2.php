<?php
namespace app\demo\controller;
use think\View;
use think\Db;
use think\Request;
use think\Controller;
use think\Session;
use think\Cookie;
use think\Validate;
use app\demo\model\User;
class Demo2 extends Controller
{
	public function bbb()
	{
		$arr=Db::table('user')->select();
		$view=new View();
		return $view->fetch('bbb',['aaaaa'=>'sdsdsdd','data'=>$arr]);
	}
	public function ccc(Request $request,$id='')
	{
        $data=$request->param();
        var_dump($data);
	}
	public function ddd()
	{
		// {$Think.server.script_name} // 输出$_SERVER['SCRIPT_NAME']变量
		// {$Think.session.user_id} // 输出$_SESSION['user_id']变量
		// {$Think.get.pageNumber} // 输出$_GET['pageNumber']变量
		// {$Think.cookie.name}  // 输出$_COOKIE['name']变量
		 $view=new View();

		 return $view->fetch('ddd');
	}
	public function eee()
	{
		$arr=['aaa'=>'AAA','bbb'=>'BBB','ccc'=>'CCC'];
		//echo json_encode($arr);
		//$this->redirect('Demo2/fff');
		//$this->success('成功','Demo2/fff');
		//$this->error('失败');
		//return redirect('http://www.baidu.com');
        //header('location:bbb');
        return redirect('fff');
    }
	public function fff()
	{
		echo "<script>alert('登录成功');</script>";
		echo "欢迎界面";
	}
	public function _empty()
	{
		echo '方法不存在';
	}
	public function ggg()
	{
		if(isset($_GET['a']))
		{
			echo "<script>alert('验证码错误');</script>";
		}
		
		return view();
	}
	public function hhh(Request $request)
	{
		$data=$request->param();
		if(!captcha_check($data['yanzheng']))
		{
			header('location:ggg?a=error');
			

		}else{
			//$this->redirect('fff');
			$validate=new Validate(['name'=>'require|max:20','age'=>'require|integer|between:1,120'],['name.require'=>'不能为空','name.max'=>'超过最大值']);
			if($validate->check($data))
			{
				echo '成功';
			}
			else
			{
				var_dump($validate->getError());
			}
		}
	}
	public function iii()
	{
		Session::set('name','thinkphp');
		cookie::set('name1','thinkphp1',3600);
	}
	public function jjj()
	{
		echo Session::get('name');
		echo '<br>';
		echo Cookie::get('name1');
	}
	public function kkk()
	{
		$res=Db::table('tg_goods')->paginate(3);
		$page=$res->render();
	    return view('kkk',['res'=>$res,'page'=>$page]);
	}
	public function lll()
	{
		return view();
	}
	public function mmm()
	{
		$file = request()->file('image');
		 dump($file);
		 if($file){
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
		        if($info){
		            // 成功上传后 获取上传信息
		            // 输出 jpg
		            echo $info->getExtension();
		            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
		            echo $info->getSaveName();
		            // 输出 42a79759f284b767dfcb2a0197904287.jpg
		            echo $info->getFilename(); 
		        }else{
		            // 上传失败获取错误信息
		            echo $file->getError();
		        }
		    }
	}
	public function nnn()
	{
		$mm=model('User');
		$arr=$mm->select();
		foreach($arr as $key=>$value)
		{
			echo $value->name;
		}
		echo '<hr>';
		$ss=new User();
		$sss=$ss->select();
		foreach($sss as $key=>$value)
		{
			echo $value->name;
		}
	}
	public function ooo()
	{
		$user=new User();
		$data=['uname'=>'hhhh','usex'=>'男'];
		var_dump($user->yyy($data));
	}
	public function ppp()
	{
		//$user=User::get(9);
		/*$user->uname='第三';   //修改
		$user->usex='女';
        $user->save();*/
        //$user->delete();       //删除
        User::destroy('7,8');    //批量删除 
	}
	public function qqq()
	{
		$user=new User();
		$user->save(['uname'=>'thinkphp','usex'=>'女'],['uid'=>8]);
	}
	public function rrr()
	{
		/*$user=User::get(2);  //单个按主键查询
		echo $user->uname;*/
		/*$user=User::get(['uname'=>'凤']);  //使用数组查询
		echo '<pre>';
		var_dump($user);*/
		/*$list=User::all('1,2,3');  //使用主键获取多个数据
		foreach($list as $vv)
		{
			echo $vv->uname;
		}*/
		$user=new User();
		$list=[
              ['uname'=>'小妖精','usex'=>'男'],
              ['uname'=>'小瓜皮','usex'=>'男']
		      ];
		$user->saveAll($list);
	}
} 																		
?>