<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="{{URL::asset('backstage/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('backstage/extend/azds_login/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('backstage/extend/azds_login/css/form-elements.css')}}">
    <link rel="stylesheet" href="{{URL::asset('backstage/extend/azds_login/css/style.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="backstage/extend/azds_login/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::asset('backstage/extend/azds_login/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::asset('backstage/extend/azds_login/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::asset('backstage/extend/azds_login/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::asset('backstage/extend/azds_login/ico/apple-touch-icon-57-precomposed.png')}}">

</head>

<body>

<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1><strong>百航科技网站管理系统</strong><sub style="font-size: 15px;">&nbsp;&nbsp;v2.0</sub></h1>
                    <div class="description">
                        <p>
                            This is a management system based on the laravel framework.
                            Download it on <a href="javascript:;"><strong>BaiHang</strong></a>, customize and use it as you like!
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Login to our site</h3>
                            <p>Enter your username and password to log on:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="form-bottom">

                            <div class="form-group">
                                <label class="sr-only" for="form-username">Username</label>
                                <input type="text" id="username" name="form-username" placeholder="用户名" class="form-username form-control" id="form-username">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="password" id="password" name="form-password" placeholder="密码" class="form-password form-control" id="form-password">
                            </div>
                            <button type="button" class="btn">立即登录</button>

                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>

</div>


<!-- Javascript -->
<script src="{{URL::asset('backstage/extend/azds_login/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{URL::asset('backstage/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('backstage/extend/azds_login/js/jquery.backstretch.min.js')}}"></script>
<script src="{{URL::asset('backstage/extend/azds_login/js/scripts.js')}}"></script>
<script src="{{URL::asset('backstage/js/plugins/layer/layer.min.js')}}"></script>
<!--[if lt IE 10]>
<script src="backstage/extend/azds_login/js/placeholder.js"></script>
<![endif]-->
<script>
    $('.btn').click(function () {
        var username=$("#username").val();
        var password=$("#password").val();
        $.post('{{route('admin.loginauth')}}', {'username':username,'password':password,'_token': '{{ csrf_token() }}'},function (o) {
            var obj=JSON.parse(o);
            if(obj.login_admin){
                //提示层
                layer.msg('认证成功正在跳转...');
                setTimeout(function () {
                    window.location.href='{{route('admin.home')}}';
                },1800)

            }else if(obj.error=='-1'){
                layer.msg(username+'账户累计错误5次将被限制登录15分钟');
                return false;
            }else{
                layer.msg('用户名或密码错误，5次错误账户将锁定一段时间！');
                return false;
            }
        });

    });

</script>
</body>

</html>