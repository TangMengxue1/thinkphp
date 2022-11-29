<?php
namespace app\index\controller;
class News extends BaseController{
    public function index(){
        $lists=NewsModel::all()
    }
}
?>