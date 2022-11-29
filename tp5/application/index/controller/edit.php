<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\edit as UserModel;
class edit extends BaseController
{
    public function index(){
    // 查询状态为1的用户数据 并且每页显示5条数据
    $users = userModel::paginate(5);
    // 把分页数据赋值给模板变量list
    $this->assign('users', $users);
   // 渲染模板输出
   return $this->fetch();
}
    public function add(){
        $this->toadd();
        return $this->fetch();
    }

    public function toadd(){
        $data=$this->request->param();
        $user=new UserModel;
        $res=$user->save($data);
        if($res){
            json(200,'添加成功');
        }else{
            json(-1001,'添加失败');
        }
    }

    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = $this->request->param()['icon'];
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move('tp5\public\static\uploads');
        if($info){
            // 成功上传后 获取上传信息
            // 输出 jpg
            echo $info->getExtension();
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            echo $info->getSaveName();
            // 输出 42a79759f284b767dfcb2a0197904287.jpg
            echo $info->getFilename(); 
        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }
    
}

?>