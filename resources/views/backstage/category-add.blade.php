@extends('backstage.layouts.empty')
@section('title','添加栏目')
@section('mycss')
    <link href="{{URL::asset('backstage/css/plugins/jsTree/style.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('backstage/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
@endsection
@section('content')
    <style type="text/css">


    </style>
    <div class="row">
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>栏目选择区域</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div id="using_json"></div>

                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="ibox float-e-margins" style="">
                <div class="ibox-title">
                    <h5>操作区域</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>

                <div class="ibox-content">
                    <form class="form-horizontal" id="form1">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">基本参数</a>
                            </li>
                            <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">栏目模型</a>
                            </li>
                            <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">单页内容</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">所属栏目</label>
                                        <div class="col-sm-10">
                                            <input  value="顶级栏目" disabled  id="pname-v" placeholder="" class="form-control" type="text">
                                            <input type="hidden" name="pid" value="0">
                                            <input type="hidden" name="pname" value="顶级栏目">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <span class="help-block m-b-none">请点击左侧栏目树列表调整父栏目</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">栏目标题</label>
                                        <div class="col-sm-10">
                                            <input name="catname" value="" placeholder="栏目标题" class="form-control" type="text">
                                            <span class="help-block m-b-none">&#123;&#123;$cate['catname']&#125;&#125;</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">副标题</label>

                                        <div class="col-sm-10">
                                            <input name="alias" value="" placeholder="副标题" class="form-control" type="text">
                                            <span class="help-block m-b-none">&#123;&#123;$cate['alias']&#125;&#125;</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">EnglishTitle</label>

                                        <div class="col-sm-10">
                                            <input name="encatname" value="" placeholder="英文标题" class="form-control" type="text">
                                            <span class="help-block m-b-none">&#123;&#123;$cate['encatname']&#125;&#125;</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">栏目状态</label>
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" checked  value="1" name="display"> <i></i>显示
                                            </label>
                                            <label>
                                                <input type="radio"  value="0" name="display"> <i></i>隐藏
                                            </label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">缩列图</label>

                                        <div class="col-sm-10">
                                            <input name="img" value="uploads/timg.jpg" placeholder="图片缩略图" class="form-control" style="width: 50%;display: inline-block;" type="text">&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" style="display: inline-block;" class="btn btn-w-m btn-primary" onClick="upImage()">上传图片</button>
                                            <span class="help-block m-b-none"><img width="180px;" id="slt" src="uploads/timg.jpg" title="&#123;&#123;$cate['img']&#125;&#125;"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">外链URL</label>

                                        <div class="col-sm-10">
                                            <input name="url" value="" placeholder="外链URL 填写将覆盖默认链接" class="form-control" type="text">
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">排序</label>
                                        <div class="col-sm-10">
                                            <input name="sort" value="50" placeholder="排序" class="form-control" type="text">
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">模型选择</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-b" >
                                                <option value="article">企业站模型</option>
                                                {{--<option value="shop">商城分类模型</option>--}}
                                                {{--<option value="article">招聘模型</option>--}}
                                            </select>
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">栏目模版选择

                                        </label>

                                        <div class="col-sm-10">

                                            <div class="radio i-checks">
                                                <label>
                                                    <input type="radio" checked  value="list" name="type"> <i></i>列表
                                                </label>
                                                <label>
                                                    <input type="radio"  value="index" name="type"> <i></i>首页
                                                </label>
                                                <label>
                                                    <input type="radio"  value="page" name="type"> <i></i>单页（仅模型为企业站有效）
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">首页模版</label>
                                        <div class="col-sm-10">
                                            <input name="index_view" value="template.cate-index" placeholder="" class="form-control" type="text">
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">列表模版</label>
                                        <div class="col-sm-10">
                                            <input name="list_view" value="template.cate-list" placeholder="" class="form-control" type="text">
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">内页模版</label>
                                        <div class="col-sm-10">
                                            <input name="page_view" value="template.cate-page" placeholder="" class="form-control" type="text">
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                            </div>
                            <div id="tab-3" class="tab-pane">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">栏目内容</label>
                                        <div class="col-sm-10">
                                            <textarea name="content"   id="content"  style="height: 400px;width: 100%;" type="text"></textarea>
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" id="add-cate" type="button">保存内容</button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection

@section('myjs')
    <!-- jsTree plugin javascript -->
    <script src="{{URL::asset('backstage/js/plugins/jsTree/jstree.min.js')}}"></script>

    <script src="{{URL::asset('backstage/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script>

        $(document).ready(function () {

            $('#add-cate').click(function(){
                var catname=$('input[name=catname]').val();
                if(catname.length<2){
                    layer.msg('栏目标题长度不得小于2位');
                    return false;
                }
                var data = $('#form1').serializeArray();
                $.post('{{route('admin.category.add')}}',data,function (j) {
                    var obj=JSON.parse(j);
                    console.log(obj.success);
                    cate_list=obj.cate_list;
                    if(JSON.parse(obj.success).success==true){
                        layer.msg('添加成功！');
                        $.jstree.destroy();
                        setTimeout(function () {
                            $('#using_json').jstree({
                                'core': {
                                    'data': [
                                        {
                                            'text': '顶级栏目',
                                            'state': {
                                                'opened': true
                                            },
                                            'children':cate_list
                                        }

                                    ]
                                }
                            });

                            $('#using_json').on('changed.jstree',function(e,data) {
//当前选中节点的id
                                console.log(data.instance.get_node(data.selected[0]).id);
                                var domId = data.instance.get_node(data.selected[0]).id;
                                var dotext=data.instance.get_node(data.selected[0]).text;
                                if(domId=='j1_1'){
                                    $('#pname-v').val('顶级栏目');
                                    $('input[name=pname]').val('顶级栏目');
                                    $('input[name=pid]').val('0');
                                }else if(domId>0){
                                    $('#pname-v').val(dotext);
                                    $('input[name=pname]').val(dotext);
                                    $('input[name=pid]').val(domId);
                                }

//当前选中节点的文本值
                                console.log(data.instance.get_node(data.selected[0]).text);
                            });


                        },800);

                        console.log(cate_list);
                    }
                });
                //console.log(data);
            });

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

    <style>
        .jstree-open > .jstree-anchor > .fa-folder:before {
            content: "\f07c";
        }

        .jstree-default .jstree-icon.none {
            width: 0;
        }
    </style>
    <script>

        $('#using_json').on('changed.jstree',function(e,data) {
//当前选中节点的id
            console.log(data.instance.get_node(data.selected[0]).id);
            var domId = data.instance.get_node(data.selected[0]).id;
            var dotext=data.instance.get_node(data.selected[0]).text;
            if(domId=='j1_1'){
                $('#pname-v').val('顶级栏目');
                $('input[name=pname]').val('顶级栏目');
                $('input[name=pid]').val('0');
            }else if(domId>0){
                $('#pname-v').val(dotext);
                $('input[name=pname]').val(dotext);
                $('input[name=pid]').val(domId);
            }

//当前选中节点的文本值
            console.log(data.instance.get_node(data.selected[0]).text);
        });
        $(document).ready(function () {

            $('#using_json').jstree({
                'core': {
                    'data': [
                        {

                            'text': '顶级栏目',
                            'state': {
                                'opened': true
                            },
                           'children':{!!$cate_json!!}
                        }

                    ]
                }
            });
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
        o_ueditorupload.addListener('beforeInsertImage', function (t,arg)
        {
            $("input[name=img]").val(arg[0].src);
            $("#slt").attr('src',arg[0].src);
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

    {{--实例化编辑器--}}
    <script type="text/javascript">
        var ue = UE.getEditor('content');
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
        });
    </script>
@endsection