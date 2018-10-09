<?php
/**
 * Created by PhpStorm.
 * User: tang
 * Date: 2018/8/8
 * Time: 10:47
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class CommController extends Controller
{

    public static function set_update($model_obj,$data,$where,$unarray=''){
        $res['success']=0;

        if(!empty($data['_token'])){
            unset($data['_token']);
        }

        if(!empty($data['id'])){
            unset($data['id']);
        }

        if(is_array($unarray)){
            foreach ($unarray as $key=>$val){
                $data[$key]=$val;
            }
        }



        $bool=$model_obj->where($where)->update($data);
        $res['success']=$bool;
        return json_encode($res);
    }



    public static  function set_add($obj,$data){
        $res['success']=0;
        if(!empty($data['_token'])){
            unset($data['_token']);
        }
        if(is_array($data)){
            foreach ($data as $key=>$val){
                $obj->$key="$val";
            }
            $bool=$obj->save();
            $res['success']=$bool;
        }

        return json_encode($res);
    }

    public static   function set_del(){

    }
}