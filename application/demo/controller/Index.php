<?php
namespace app\demo\controller;
use think\Db;
use think\Request;
class Index
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }
    public function index1(){
    	echo "dsfdsdsfdsfsdfsdffsfsdfsdfsdfdsfdfdsfsdfsdfsdfsdfdsfdsfdsfsdfsdfsdfd";
    }
    public function demo1($id="")
    {
    	echo $id;
    }
    public function demo2($ss="")
    {
    	echo $ss;
    }
    public function demo3(Request $reque)
    {
    	$all=$reque->param();
    	var_dump($all);
    }
    public function demo4()
    {
    	$obj=Request::instance();
        $all=$obj->param();
        var_dump($all);
    }
    public function demo5()
    {
    	$all=input('param.');
    	var_dump($all);
    }
    public function demo6(Request $requ,$name='world')
    {
      echo 'domain:'.$requ->domain().'<br>';
      echo 'name:'.$name.'<br>';
      echo '当前入口文件：'.$requ->baseFile()."<br>";
      echo 'url地址：'.$requ->url().'<br>';
      echo 'root：'.$requ->root().'<br>';//获取URL访问的root地址
      echo 'baseroot：'.$requ->baseUrl().'<br>';
      echo 'pathinfo：'.$requ->path().'<br>';	
      echo 'ext：'.$requ->ext().'<br>';//获取url后缀信息
      echo 'pathinfo：'.$requ->pathinfo().'<br>';
    }
    public function demo7()
    {
      //$arr=Db::query('select * from tg_class');
      //$bool=Db::execute("insert into user value(5,'dfdsfds','女')");
      //$bool=Db::execute("update user set uname='你好' where uid = 5");
      //$arr=Db::table('tg_style')->where(['class_id'=>19])->select();
      //$arr=Db::name('style')->where(['id'=>2])->find();
      //$arr=Db::name('style')->where('class_id','>',18)->select();
      //$bool=Db::table('user')->delete([3,4]);
      $data=['uid'=>3,'uname'=>'风刀霜剑','usex'=>'女'];
      //$bool=Db::table('user')->insert($data);
      $bool=Db::table('user')->where(['uid'=>3])->update($data);
      dump($bool);
    }
    public function demo8()
    {
      //$arr=Db::table('user')->where('uid','>',4)->where('usex','女')->select();
      //$arr=Db::table('user')->where('uid','>',1)->where('uid','<',4)->whereOr('usex','女')->select();
      //$arr=Db::table('user')->field('uname,usex')->select();
      //$arr=Db::table('user')->field('uid,uname,usex')->where('uid','<',6)->order('uid desc')->select();
      $arr=Db::table('user')->field('usex,count(*)')->group('usex')->select();
      dump($arr);
    }
}
