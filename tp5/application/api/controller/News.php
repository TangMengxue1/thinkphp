<?php
namespace app\api\controller;
use app\api\model\NewsType;
use app\api\model\News as NewsModel;
use think\Controller;
use think\Db;
use think\facade\Cache;

class News extends Controller
{
    protected function initialize(){
        if(empty(Cache::get('token'))){
            json(-1001,'请先登录');
        }
     }

    public function chekUser(){   
        $params=$this->requset->param();
        if(Cache::get($params['username']!=$params['token'])){
            json(-1001,'请先登录');
        }

    }

   public function types(){
    //$types = Db::table('news_type')->where('state',1)->select();
    $types = NewsType::where('state',1)->select();
    json (200,'请求成功',$types);
   }
    
   public function index($id=0){
     $this->chekUser();
     $model=new NewsModel();
     $list=$model->getList($id);
     json (200,'请求成功',$list);

   }
}
?>