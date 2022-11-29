<?php
namespace app\index\model;
use think\Model;

class User extends Model
{
    public function getTypeAttr($value)
    {
        $status = [1=>'学生',2=>'老师',3=>'校长'];
        return $status[$value];
    }

   public function getCreateTimeAttr($value){
    return date("Y-m-d",$value);
   }
}