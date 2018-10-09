<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Info;
class InfoController extends Controller
{
    //
    function index(){
        $data=Info::find(1)->toArray();
        return view('backstage.info',$data);
    }

    function update(Request $request){
        $res['success']=0;
        $data = $request->all();

        $bool=new CommController();

        unset($data['_token']);
        if(empty($data['wap'])){
            $data['wap']=0;
        }
        $info=Info::where('id',1)->update($data);

        $res['success']=$info;
        return json_encode($res);

    }

}
