<?php

namespace app\api\model;

use think\Model;
use think\Db;


class News extends Model
{
  
   protected $autoWriteTimestamp = false;

   public function getList($type_id)
   {
      if ($type_id <= 0) {
         $res = Db::query("select id from news_type where state=1 order by id limit 1");
         $type_id = $res[0]['id'];
      }

      return $list = $this->where('type_id', $type_id)->select();
   }
}
