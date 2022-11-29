<?php
namespace app\index\model;
use think\Model;

class NewsType extends Model
{
    public function NewsType()
    {
        return $this->belongsTo('NewsType','type_id','name');
    }
}