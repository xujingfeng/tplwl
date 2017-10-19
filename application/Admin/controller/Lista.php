<?php 
namespace app\Admin\controller;
use think\Request;
use think\Db;
use app\Admin\model\Upp;
use app\Admin\controller\Auth;
class Lista extends Auth
{
	public function ull()
	{
        $data=Db::table('ts_books')->alias('a')->join('ts_class w','a.classId=w.id')->where(['status'=>1])->order('bookId','desc')->paginate(3);
        //$res=Db::table('ts_books')->;
		$page=$data->render();
	    //return view('ull',['res'=>$res,'page'=>$page]);
		return view('ull',['arr'=>$data,'page'=>$page]);
	}
	//默认排序的方法
	public function shijian()
	{
        $data=Db::table('ts_books')->alias('a')->join('ts_class w','a.classId=w.id')->where(['status'=>1])->order('intimes','desc')->paginate(3);
        $page=$data->render();
		return view('ull',['arr'=>$data,'page'=>$page]);
	}
	public function price()
	{
        $data=Db::table('ts_books')->alias('a')->join('ts_class w','a.classId=w.id')->where(['status'=>1])->order('price','desc')->paginate(3);
		$page=$data->render();
		return view('ull',['arr'=>$data,'page'=>$page]);
	}
	public function num()
	{
        $data=Db::table('ts_books')->alias('a')->join('ts_class w','a.classId=w.id')->where(['status'=>1])->order('num','desc')->paginate(3);
		$page=$data->render();
		return view('ull',['arr'=>$data,'page'=>$page]);
	}
	public function uptimes()
	{
        $data=Db::table('ts_books')->alias('a')->join('ts_class w','a.classId=w.id')->where(['status'=>1])->order('uptimes','desc')->paginate(3);
		$page=$data->render();
		return view('ull',['arr'=>$data,'page'=>$page]);
	}
	public function del()
	{
		if(isset($_GET['bookId']))
		{
			$bookId=$_GET['bookId'];
			$bool=$user=new Upp;
						
				        $bool=$user->save([
	                        'status'=>0
				        	],['bookId'=>$bookId]);
		    if($bool)
		    {
		    	echo "<script>alert('下架成功，存储至回收站')</script>";
		    	$data=Db::table('ts_books')->alias('a')->join('ts_class w','a.classId=w.id')->where(['status'=>1])->order('bookId','desc')->paginate(3);
			    $page=$data->render();
			    return view('ull',['arr'=>$data,'page'=>$page]);
		    }
		    else{
		    	echo "<script>alert('下架失败，请稍后再试')</script>";
		    	$data=Db::table('ts_books')->alias('a')->join('ts_class w','a.classId=w.id')->where(['status'=>1])->order('bookId','desc')->paginate(3);
			    $page=$data->render();
			    return view('ull',['arr'=>$data,'page'=>$page]);
		    }
		
		}
		else{
			    $data=Db::table('ts_books')->alias('a')->join('ts_class w','a.classId=w.id')->where(['status'=>1])->order('bookId','desc')->paginate(3);
			    $page=$data->render();
			    return view('ull',['arr'=>$data,'page'=>$page]);
		}
		
	}
	public function chaxun(Request $request)
	{
		if($request->isPost())
		{
			$data=$request->param();
			$search=$data['search'];
			$data=Db::table('ts_books')->alias('a')->join('ts_class w','a.classId=w.id')->where(['status'=>1])->where('bookName','like','%'.$search.'%')->order('intimes','desc')->paginate(3);
	        $page=$data->render();
			return view('ull',['arr'=>$data,'page'=>$page]);
		}
		else
		{
			$data=Db::table('ts_books')->alias('a')->join('ts_class w','a.classId=w.id')->where(['status'=>1])->order('intimes','desc')->paginate(3);
	        $page=$data->render();
			return view('ull',['arr'=>$data,'page'=>$page]);
		}
		
	}
}
