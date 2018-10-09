<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    //
    protected $obj;
    public function __construct()
    {
        $this->obj=new \App\Model\Album();
    }

    function addview(){

        return view('backstage.albums-add');
    }


    function add(Request $request){
        $pdate=$request->all();

       // print_r($pdate);

        $res['success']=0;
       if(is_array($pdate['imgs']['src'])){

            foreach ($pdate['imgs']['src'] as $key => $val){
                $data[$key]['src']=$val;
                $data[$key]['alt']=$pdate['imgs']['alt'][$key];
            }
            $set['albumtitle']=$pdate['albumtitle'];
            $set['content']=json_encode($data);
            $bool=$this->obj->insert($set);
            $res['success']=$bool;
        }

        return json_encode($res);
    }

    public function index(){
        return view('backstage.albums-list');
    }

    public function getdate(){
        $data=$this->obj->select('id','albumtitle')->get()->toArray();
        return json_encode($data);
    }

    public function updateview($id){
        return view('backstage.albums-update', ['albums' => $this->obj->findOrFail($id)->toArray()]);
    }


    public function update(Request $request){
        $updata=$request->all();
        $res['success']=0;
        if(is_array($updata['imgs']['src'])){

            foreach ($updata['imgs']['src'] as $key => $val){
                $data[$key]['src']=$val;
                $data[$key]['alt']=$updata['imgs']['alt'][$key];
            }
            $set['albumtitle']=$updata['albumtitle'];
            $set['content']=json_encode($data);

            $bool=$this->obj->where('id',$updata['id'])->update($set);
            $res['success']=$bool;
        }

        return json_encode($res);



    }

    public function del(Request $request){
        $res['success']=0;
        $id=$request->input('id');
        $res['success']=$this->obj->destroy($id);
        return json_encode($res);
    }

}
