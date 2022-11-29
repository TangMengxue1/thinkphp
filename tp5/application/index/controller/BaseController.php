<?php
namespace app\index\controller;
use think\Controller;
use think\facade\Session;

class BaseController extends Controller{
    protected function initialize(){
      if (empty(Session::get('username'))) {
      $this->error('请先登录', 'login/index');
}
}
}
