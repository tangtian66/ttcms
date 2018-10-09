@extends('backstage.layouts.empty')
@section('title','编辑相册')
@section('mycss')

@endsection
@section('content')
    <form id="form1">
    <div class="row">
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="file-manager">
                        <h5>相册标题</h5>
                        <input type="text" placeholder="请输入相册标题" name="albumtitle" value="{{$albums['albumtitle']}}" class="form-control">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id" value="{{$albums['id']}}">
                        <div class="hr-line-dashed"></div>
                        {{--<h5>封面</h5>--}}
                        {{--<img src="backstage/img/p1.jpg" style="width: 100%;">--}}
                        {{--<div class="hr-line-dashed"></div>--}}
                        <button class="btn btn-primary btn-block" type="button" onClick="upImage()">批量上传图片</button>
                        <div class="hr-line-dashed"></div>
                        <button class="btn btn-info btn-block" id="save_data" type="button" >保存相册</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9 animated fadeInRight">
            <div class="row">
                <div class="col-sm-12" id="imgs_count">

                    @foreach(json_decode($albums['content'],true) as $val)
                    <div class="file-box"  onclick="del(this)">
                        <div class="file">
                            <a href="javascript:void(0);">
                                <span class="corner"></span>

                                <div class="image">
                                    <img alt="image" class="img-responsive" src="{{$val['src']}}">
                                    <input type="hidden" name="imgs[src][]" value="{{$val['src']}}">
                                    <input type="hidden" name="imgs[alt][]" value="{{$val['alt']}}">
                                </div>
                                <div class="file-name">
                                    {{$val['alt']}}
                                </div>
                            </a>

                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection

@section('myjs')
    <script>

        $('#save_data').click(function () {
            var albumtitle=$("input[name='albumtitle']").val();
            if(albumtitle.length<2){
                layer.msg('相册标题不得小于2位');
                return false;
            }else{
                var formdata=$('#form1').serializeArray();
                console.log(formdata.length);
                if(formdata.length<3){
                    layer.msg('请确保相册至少有一张图片');
                    return false;
                }
                $.post('{{'admin/album-update'}}',formdata,function (o) {
                    var data=JSON.parse(o);
                    if(data.success==1){
                        layer.confirm('添加成功选择操作', {
                            btn: ['留在页面','返回列表'] //按钮
                        }, function(){
                            layer.msg('留下来继续修改');
                        }, function(){
                            parent.location.reload();
                            var index = parent.layer.getFrameIndex(window.name);
                            setTimeout(function(){parent.layer.close(index)}, 1000);
                        });
                    }
                });

            }

        });
    </script>
    <script type="text/plain" id="j_ueditorupload" style="height:5px;display:none;"></script>


    <script>
    //实例化编辑器
    var o_ueditorupload = UE.getEditor('j_ueditorupload',
        {
            autoHeightEnabled:false
        });

    o_ueditorupload.ready(function ()
    {
        o_ueditorupload.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
        o_ueditorupload.hide();//隐藏编辑器

        //监听图片上传
        o_ueditorupload.addListener('beforeInsertImage', function (t,result)
        {

            for(var i in result){
                $("#imgs_count").append('  <div class="file-box" id="img_'+i+'" onclick="del(this)">\n' +
                    '                        <div class="file">\n' +
                    '                            <a href="javascript:void(0);">\n' +
                    '                                <span class="corner"></span>\n' +
                    '\n' +
                    '                                <div class="image">\n' +
                    '                                    <img alt="image" class="img-responsive" src="'+result[i].src+'">\n' +
                    '                                    <input type="hidden" name="imgs[src][]" value="'+result[i].src+'">\n' +
                    '                                    <input type="hidden" name="imgs[alt][]" value="'+result[i].alt+'">\n' +
                    '                                </div>\n' +
                    '                                <div class="file-name">\n' +
                    result[i].alt+
                    '\n' +
                    '                                </div>\n' +
                    '                            </a>\n' +
                    '\n' +
                    '                        </div>\n' +
                    '                    </div>');
            }

        });

        /* 文件上传监听
         * 需要在ueditor.all.min.js文件中找到
         * d.execCommand("insertHtml",l)
         * 之后插入d.fireEvent('afterUpfile',b)
         */
        o_ueditorupload.addListener('afterUpfile', function (t, arg)
        {
            alert('这是文件地址：'+arg[0].url);
        });
    });

    function del(obj) {
        layer.confirm('确认删除该图片吗？', {
            btn: ['确认','取消']
        },function () {
            obj.remove();
            layer.msg('删除成功', {icon: 1});
        },function () {
            layer.msg('取消操作', {icon: 2});
        });

    }

    //弹出图片上传的对话框
    function upImage()
    {
        var myImage = o_ueditorupload.getDialog("insertimage");
        myImage.open();
    }
    //弹出文件上传的对话框
    function upFiles()
    {
        var myFiles = o_ueditorupload.getDialog("attachment");
        myFiles.open();
    }
    </script>


@endsection
