<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    //
    public function addview()
    {
        $cate_obj = new \App\Model\Category();

        $data =  $cate_obj->select('id', 'pid', 'catname')->where([['model','=','article'],['type','<>','page']])->orderBy('sort', 'desc')->orderBy('id', 'asc')->get()->toArray();
        $data = tgp_tree($data);
        // print_r($data);
        $data['cate_json'] = json_encode($data);
        //$data['cate_json'] = json_encode($data);

        return view('backstage.article-add',$data);
    }

}
