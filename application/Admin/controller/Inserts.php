<?php 
namespace app\Admin\controller;
use think\Db;
use think\Request;
use think\Validate;
use think\Controller;
use app\Admin\model\Inse;
use app\Admin\controller\Auth;
class Inserts extends Auth
{
	public function inse(Request $request)
	{
    if($request->isPost())
    {
      $data=$request->param();
             $file = request()->file('bookImage');
             //dump($file);
             if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                    if($info){
                        // 成功上传后 获取上传信息
                        // 输出 jpg
                        //echo $info->getExtension();
                        // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                         $bookImage=$info->getSaveName();
                        // 输出 42a79759f284b767dfcb2a0197904287.jpg
                         //$info->getFilename(); 
                    }else{
                        // 上传失败获取错误信息
                        echo $file->getError();
                    }
                }
            $time=time();
            $user=new Inse();
            $list=['classId'=>$data['classId'],'bookImage'=>$bookImage,'bookName'=>$data['bookName'],'publisher'=>$data['publisher'],'author'=>$data['author'],'num'=>$data['num'],'price'=>$data['price'],'detail'=>$data['content'],'intimes'=>$time];
            $bool=$user->ppp($list);
            if($bool)
                {
                    echo "<script>alert('添加成功');window.location.assign('inserts')</script>";

                }
                else
                {
                    echo "<script>alert('添加失败');window.location.assign('inserts')</script>";
                    
                }
    }
		$mm=model('Inse');
		$arr1=$mm->select();
		//return view();
		return view('inse',['arr1'=>$this->tree($arr1)]);
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