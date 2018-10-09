@extends('backstage.layouts.empty')
@section('title','添加信息')
@section('mycss')
    <link href="{{URL::asset('backstage/css/plugins/jsTree/style.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('backstage/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
@endsection
@section('content')

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

                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">所属栏目</label>
                                            <div class="col-sm-10">
                                                <input  value="请选择一个栏目" disabled  id="classname-v" placeholder="" class="form-control" type="text">
                                                <input type="hidden" name="categories_id" value="0">
                                                <input type="hidden" name="classname" value="顶级栏目">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <span class="help-block m-b-none">请点击左侧栏目树列表调整栏目</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">信息标题</label>
                                            <div class="col-sm-10">
                                                <input name="catname" value="" placeholder="栏目标题" class="form-control" type="text">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">副标题</label>

                                            <div class="col-sm-10">
                                                <input name="subtitle" value="" placeholder="副标题" class="form-control" type="text">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">信息编号</label>

                                            <div class="col-sm-10">
                                                <input name="identifier" value="{{uniqid().rand(100,999)}}" placeholder="文件or产品识别码" class="form-control" type="text">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">审核状态</label>
                                            <div class="radio i-checks">
                                                <label>
                                                    <input type="radio" checked  value="1" name="examine"> <i></i>已审核
                                                </label>
                                                <label>
                                                    <input type="radio"  value="0" name="examine"> <i></i>未审核
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
                                            <label class="col-sm-2 control-label">原文链接</label>

                                            <div class="col-sm-10">
                                                <input name="url" value="" placeholder="原文链接 http://" class="form-control" type="text">
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
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">发布日期</label>
                                            <div class="col-sm-10">
                                                <input name="pubtime" value="{{date('Y-m-d',time())}}" placeholder="yyyy-MM-dd" class="form-control" id="test1" type="text">
                                                <span class="help-block m-b-none"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">信息内容</label>
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
    <script src="{{URL::asset('backstage/js/plugins/layer/layDate-v5.0.9/laydate.js')}}"></script>

    <script>

        $(document).ready(function () {
            laydate.render({
                elem:'#test1'
            });


            $('#add-cate').click(function(){
                var title=$('input[name=title]').val();
                if(title.length<2){
                    layer.msg('标题长度不得小于2位');
                    return false;
                }
                var categories_id=$('input[name=categories_id]').val();
                if(categories_id==0){
                    layer.msg('请从栏目树选择一个栏目');
                    return false;
                }

                var data = $('#form1').serializeArray();
                $.post('{{route('admin.article.add')}}',data,function (j) {
                    var obj=JSON.parse(j);
                    console.log(obj.success);
                    cate_list=obj.cate_list;
                    if(JSON.parse(obj.success).success==true){
                        layer.msg('添加成功！');
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
            if(domId>0){
                $('#classname-v').val(dotext);
                $('input[name=categories_id]').val(dotext);

            }

//当前选中节点的文本值
            console.log(data.instance.get_node(data.selected[0]).text);
        });
        $(document).ready(function () {

            $('#using_json').jstree({
                'core': {
                    'data':{!!$cate_json!!}



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