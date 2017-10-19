<?php 
namespace app\Admin\controller;
use think\Request;
use think\Db;
use app\Admin\model\Inse;
use app\Admin\controller\Auth;
class Assort extends Auth
{
	public function fenlei(Request $request)
	{
		if($request->isPost())
		{
			$data=$_POST;
	        //$sqls="insert into tg_class(title,pid) value('{$data['names']}',{$data['ids']})";
	        //$bool=DB::getDB()->query($sqls);
	        //$inserID=DB::getDB()->getinsertId();
	        $user=new Inse();
	        $user->title=$data['names'];
	        $user->pid=$data['ids'];
	        $bool=$user->save();
	        if($bool)
                {
                    return json_encode(['status'=>1]);
                }
                else
                {
                    return json_encode(['status'=>0]);
                }
		}
		$mm=model('Inse');
		$arr1=$mm->select();
		//return view();
		return view('fenlei',['arr1'=>$this->tree($arr1)]);
	}
	public function tree($array,$id=0,$pid=0)
    {   
       static $newArr=array();
          foreach ($array as $key => $value) {
                  if($value['pid']==$id){
                       $value['num']=$pid;
                       $newArr[]=$value;               
                      $this->tree($array,$value['id'],$pid+1); 
                      
                  }
             
          }
          return $newArr;
   }	
		
 }
