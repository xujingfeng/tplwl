<?php 
namespace app\demo\controller;
use think\Controller;
class Demo extends Controller
{
	public function demo1()
	{
		$this->assign('dd','小妖精');
		$this->assign('sss',['dc'=>'dfdf','dd'=>'dfsd','dds'=>'dsfsd','dss'=>'sdfds']);
		return $this->fetch('demo1');
		//return view('demo1');
	}
	public function demo2()
	{
		var_dump($_POST);
	}
	public function demo3()
	{
		sssa();lnnnbasssas
	}
	public function demo4()
	{
		return view('demo2',['aaa'=>'asd','bbb'=>'sfd','ccc'=>'sdd','ddd'=>['sss','sdd','rtrt','ghgh']]);
	}
}
?>