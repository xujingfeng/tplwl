<?php 
namespace app\Admin\controller;
use think\Request;
use think\Model;
use app\Admin\model\Inse;
use app\Admin\model\Upp;
use think\Db;
use app\Admin\controller\Auth;
class Update extends Auth
{
	public function updt(Request $request)
	{
	    $bookId=$_GET['bookId'];
        $time=time();
		
		if($request->isPost())
		{
			$data=$request->param();
			//echo $data['bookId'];
			//die();
			//var_dump($data);
			//echo $_GET['bookId'];
			$file = request()->file('bookImage');
             //dump($file);
             if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                    if($info){
                         $bookImage=$info->getSaveName();

                    }else{
                        // 上传失败获取错误信息
                        echo $file->getError();
                        return;
                    }
                    $user=new Upp;
					
			        $bool=$user->save([
                        'classId'=>$data['classId'],
						'bookImage'=>$bookImage,
						'bookName'=>$data['bookName'],
						'publisher'=>$data['publisher'],
						'author'=>$data['author'],
						'num'=>$data['num'],
						'price'=>$data['price'],
						'uptimes'=>$time,
						'detail'=>$data['content']
			        	],['bookId'=>$bookId]);
			        //var_dump($bool);
			        if($bool)
				        {
				        	echo "<script>alert('修改成功');window.location.assign('update?bookId={$_GET['bookId']}');</script>";
				        }
				        else{
				        	echo "<script>alert('修改失败');window.location.assign('update?bookId={$_GET['bookId']}');</script>";
				        }
                }else{
                	
                	 $user=new Upp;
					
			        $bool=$user->save([
                        'classId'=>$data['classId'],
						'bookName'=>$data['bookName'],
						'publisher'=>$data['publisher'],
						'author'=>$data['author'],
						'num'=>$data['num'],
						'price'=>$data['price'],
						'uptimes'=>$time,
						'detail'=>$data['content']
			        	],['bookId'=>$bookId]);
			         //var_dump($bool);
			         if($bool)
				        {
				        	echo "<script>alert('修改成功');window.location.assign('update?bookId={$_GET['bookId']}');</script>";
				        }
				        else{
				        	echo "<script>alert('修改失败');window.location.assign('update?bookId={$_GET['bookId']}');</script>";
				        }
                }
		}
		$mm=model('Inse');
		$arr1=$mm->select();
		//return view();
		$data=Db::table('ts_books')->where('bookId',$bookId)->select();
		foreach ($data as $key => $value) {
		
		}
		return view('updt',['arr1'=>$this->tree($arr1),'arr2'=>$value]);
		//return view();
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