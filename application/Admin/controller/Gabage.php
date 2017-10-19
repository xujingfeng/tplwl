<?php 
namespace app\Admin\controller;
use think\Request;
use think\Db;
use app\Admin\model\Upp;
use app\Admin\controller\Auth;
class Gabage extends Auth
{
	public function del()
	{
		$data=Db::table('ts_books')->alias('a')->join('ts_class w','a.classId=w.id')->where(['status'=>0])->order('bookId','desc')->select();
		return view('del',['arr'=>$data]);
	}
	public function huanyuan()
	{
		$bookId=$_GET['bookId'];
		$bool=$user=new Upp;
					
			        $bool=$user->save([
                        'status'=>1
			        	],['bookId'=>$bookId]);
	    if($bool)
	    {
	    	echo "<script>alert('还原成功')</script>";
	    	$data=Db::table('ts_books')->alias('a')->join('ts_class w','a.classId=w.id')->where(['status'=>0])->order('bookId','desc')->select();
	    	//var_dump($data);
	    	if(!empty($data))
	    	{
	    	    return view('del',['arr'=>$data]);	
	    	}else{
	    		/*return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">回收站空空如也</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';*/
	    		return view('del',['arr'=>$data]);
	    	}
		    
	    }
	    else{
	    	echo "<script>alert('还原失败，请稍后再试')</script>";
	    	$data=Db::table('ts_books')->alias('a')->join('ts_class w','a.classId=w.id')->where(['status'=>0])->order('bookId','desc')->select();
	    	//var_dump($data);
		    if(!empty($data))
	    	{
	    	    return view('del',['arr'=>$data]);	
	    	}else{
	    		/*return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">回收站空空如也</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';*/
	    		return view('del',['arr'=>$data]);
	    	}
		    
	    }
	}
	public function qingchu()
	{
		echo $bookId=$_GET['bookId'];
		$bool=Upp::where('bookId','=',$bookId)->delete();
		if($bool)
		{
			echo "<script>alert('清除成功');</script>";
			$data=Db::table('ts_books')->alias('a')->join('ts_class w','a.classId=w.id')->where(['status'=>0])->order('bookId','desc')->select();
		    return view('del',['arr'=>$data]);
		}
		else{
			echo "<script>alert('清除失败，请稍后再试');</script>";
			$data=Db::table('ts_books')->alias('a')->join('ts_class w','a.classId=w.id')->where(['status'=>0])->order('bookId','desc')->select();
		    return view('del',['arr'=>$data]);
		}
		
	}

}