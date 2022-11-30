<?php
namespace app\api\controller;

use think\Controller;
use think\Db;
use app\index\model\admin as UserModel;
use think\facade\Cache;
class Login extends Controller
{
public function login($username, $password)
{
     //1. 判断用户是否存在
     $admin = Db::table('admin')->where('username',$username)->find();
     if (!$admin) {
       json(0,'用户不存在');
     } 
     //2. 判断密码是否正确
     if ($admin['password'] == $password) {
           $token = md5($username+'cypt11');
           Cache::set('token',$token);
           json(200,'登录成功',['token'=>$token,'username'=>$username]);
           
         //Session::set('username','ture');
     } else {
        json(0,'用户名或密码错误');
     }
  }
 
}

?>