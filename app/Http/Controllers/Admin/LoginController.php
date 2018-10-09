<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin;
use App\Model\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //
    public function authenticate(Request $request)
    {
        $data['login_admin']=false;
        $data['error']='0';
        if($request->ajax()){

            $username=$request->input('username');
            $password=$request->input('password');
            $obj=new \App\Model\Admin();
            $res=$obj->where('name',$username)->get()->toArray();
            if(!empty($res[0]['name'])){
                $user=$res[0];

                if($user['login_time']>time()){
                    $data['login_time']=true;
                    $data['error']='-1';
                }else{
                    if (Auth::guard('admin')->attempt(['name' => $username, 'password' => $password])) {
                        // 认证通过...
                        $data['login_admin']=true;
                        session(['login_sessionid' => $request->session()->getId()]);
                        $data['uid']=Auth::guard('admin')->id();

                            $set['error']=0;
                            $set['login_time']=0;
                            $obj->where('name',$username)->update($set);

                    }else{
                        $set['error']=$user['error']+1;
                        if($set['error']>=5){
                            $set['error']=0;
                            $set['login_time']=time()+60*15;
                            $str="账户:{$username}累计5次密码错误被系统锁定15分钟。";
                            set_log($str);
                        }
                        $obj->where('name',$username)->update($set);

                    }
                }



            }



        }



             return json_encode($data);
    }

    public function quit()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }


}
