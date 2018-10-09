<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    protected $obj='';

    public function __construct()
    {
        $this->obj=new \App\Model\Category();
    }

    //
    public function index(){

    }

    public function updateview(){
        $obj = $this->obj;
        $data=$obj->select('id','pid','catname')->orderBy('sort','desc')->orderBy('id','asc')->get()->toArray();
        $arr=tgp_tree($data,0,'text','nodes',0,0);
        $data=tgp_tree($data);

        $data['cate_json']=json_encode($data);
        $data['cate_json_l']=json_encode($arr);
        return view('backstage.category-update',$data);
    }

    public function update(Request $request){

        $obj= $this->obj;
        $data = $request->all();
        $where[]=['id','=',$data['id']];

        $res['success']= CommController::set_update($obj,$data,$where);
        $new=$obj->select('id','pid','catname')->orderBy('sort','desc')->orderBy('id','asc')->get()->toArray();
        $res['cate_list']=tgp_tree($new);
        return json_encode($res);

    }

    public function add(Request $request){
        $obj  = $this->obj;
        $data = $request->all();
        $res['success']=CommController::set_add($obj,$data);
        $new=$obj->select('id','pid','catname')->orderBy('sort','desc')->orderBy('id','asc')->get()->toArray();
        $res['cate_list']=tgp_tree($new);
        return json_encode($res);
    }

    public function addview(){
        $obj=  $this->obj;

        $data=$obj->select('id','pid','catname')->orderBy('sort','desc')->orderBy('id','asc')->get()->toArray();
       // print_r($data);
        $data=tgp_tree($data);
       // print_r($data);
        $data['cate_json']=json_encode($data);

       return view('backstage.category-add',$data);
    }

    public function ajax_get_cate($id){

        $res=$this->obj->find($id)->toArray();

        return json_encode($res);

    }

    public function set_del(Request $request){
        $res['success']=0;
        $obj  = $this->obj;
        $post_data = $request->all();
        $data=$obj->select('id','pid')->get()->toArray();
        if($post_data['id']>0){
            if(is_array($data)){

                $inid=$this->getson($data,$post_data['id']);
                $inid[]=$post_data['id'];
                if(is_array($inid)){
                    $res['success']=$obj->destroy($inid);
                }

            }
        }
        return json_encode($res);
    }

    protected function getson($data,$pid,&$tree=[]){

        foreach ($data as $key=>$val){
            if($val['pid']==$pid){
                $tree[]=$val['id'];
                 $this->getson($data,$val['id'],$tree);
            }

        }
        return $tree;
    }

    public function ajax_get_list(){

       $data='';
       return $data;

    }


}
