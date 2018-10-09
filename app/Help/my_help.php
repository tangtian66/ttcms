<?php
/**
 * Created by PhpStorm.
 * User: tang
 * Date: 2018/8/7
 * Time: 8:53
 */
if (!function_exists('test')) {
    function test()
    {
        return "test";
    }

}
if (!function_exists('set_log')) {
    function set_log($content){
        $log=new \App\Model\Log();
        $data['content']=$content;
        $log->insert($data);
    }
}

if (!function_exists('tgp_tree')) {
    function tgp_tree($data,$pid=0,$title='text',$children='children',$state=1,$ench=1)
    {
        $tree=[];
        $i=0;
       foreach ($data as $key=>$val){
           if($val['pid']==$pid){

               $tree[$i]=$val;
               $tree[$i][$title]=$val['catname'];
                if($state==1){
                    $tree[$i]['state']['opened']=true;
                }


               if(is_array($data)){
                   $tree[$i][$children]=tgp_tree($data,$val['id']);
               }else{

                   $tree[$i][$children]='';

               }
               if($ench<>1&&empty($tree[$i][$children])){
                   unset($tree[$i][$children]);
               }
//               unset($data[$i]);
               $i++;

           }
       }
        return $tree;
    }

}