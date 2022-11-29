<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\admin as UserModel;
use think\facade\Session;

class Login extends Controller
{
    public function index(){
    return $this->fetch();
}

public function login($username, $password)
{
     //1. 判断用户是否存在
     $admin = Db::table('admin')->where('username',$username)->find();
     if (!$admin) {
         $this->error('用户不存在');
     } 
     //2. 判断密码是否正确
     if ($admin['password'] == $password) {
         Session::set('username','ture');
         $this->success('登录成功', 'index/user/index');
         
     } else {
         echo "<script>alert('用户名或密码错误');history.go(-1);</script>";
     }
  }
 
}

?>