@extends('backstage.layouts.empty')
@section('title','栏目管理')
@section('mycss')
    <link href="{{URL::asset('backstage/css/plugins/jsTree/style.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('backstage/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>点击要编辑的栏目</h5>
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
            <div class="ibox float-e-margins" id="updatebody" >
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
                                            <div class="col-sm-10" id="selpid">
                                                <input  value="顶级栏目"     readonly id="pname-v" style="cursor:pointer;" placeholder="" class="form-control" type="text">
                                                <input type="hidden" name="pid" value="0">
                                                <input type="hidden" name="id" value="0">
                                                <input type="hidden" name="pname" value="顶级栏目">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <span class="help-block m-b-none"><div id="treeview" style="display: none;"  class="test"></div></span>
                                                <span class="help-block m-b-none">点击栏目名称调整所属栏目</span>
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
                                            <div class="col-sm-10">

                                                    <input type="radio" id="dis1"  value="1" name="display"> <i></i>显示


                                                    <input type="radio"  id="dis0" value="0" name="display"> <i></i>隐藏

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
                                                <select id="models" name="model" class="form-control m-b" >
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



                                                        <input type="radio" checked  value="list" name="type">列表


                                                        <input type="radio"  value="index" name="type">首页


                                                        <input type="radio"  value="page" name="type"> 单页（仅模型为企业站有效）



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
                                <button class="btn btn-primary" id="update-cate" style="display: none;" type="button">保存内容</button>

                                <button class="btn btn-white" id="del-cate" style="display: none;" type="button">删除栏目及子栏目</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="ibox float-e-margins"></div>
        </div>
    </div>

@endsection

@section('myjs')
    <!-- jsTree plugin javascript -->
    <script src="{{URL::asset('backstage/js/plugins/jsTree/jstree.min.js')}}"></script>
    <script src="{{URL::asset('backstage/js/plugins/bootstrap-table/bootstrap-table.min.js')}}"></script>

    <script src="{{URL::asset('backstage/js/plugins/treeview/bootstrap-treeview.js')}}"></script>

    <script src="{{URL::asset('backstage/js/plugins/iCheck/icheck.min.js')}}"></script>

    <script>

        $(document).ready(function () {
            $("#del-cate").click(function () {


                layer.confirm('确认删除当前栏目及其子栏目吗', {
                    time: 20000, //20s后自动关闭
                    btn: ['确认', '取消']
                },
                function () {
                    var id=$("input[name=id]").val();
                    if(id>0){
                        $.post('{{route('admin.category.del')}}',{'id':id,'_token':'{{csrf_token()}}'},function (o) {
                            var obj=JSON.parse(o);
                            if(obj.success==1){
                                layer.msg('删除成功！正在刷新...');
                                setTimeout(function () {
                                   window.location.href=window.location.href;
                                },1000);
                            }
                        })
                    }
                   
                },function () {
                        layer.msg('操作已取消', {icon: 2});
                    }
                );
            });
            
            
            $("#selpid").mouseleave(function () {

                $('#treeview').css('display','none');
            });
            $("#pname-v").focus(function(){
                $('#treeview').toggle();
                $('#pname-v').blur();
            });
            var tree = [
                {
                    id:0,
                    text:"顶级栏目",

                    nodes: {!!$cate_json_l!!}
                }
            ];

            $('#treeview').treeview({data: tree});
            $('#treeview').on('nodeSelected',function(event, data) {
                $('input[name=pid]').val(data.id);
                $('input[name=pname]').val(data.text);
                $('#pname-v').val(data.text);
                $('#treeview').toggle();
            });

            $('#all').click(function () {
                $('#treeview').treeview('expandAll');
            });



            $('#update-cate').click(function(){
                var index = layer.load(1, {
                    shade: [0.5,'#fff'] //0.1透明度的白色背景
                });
                var catname=$('input[name=catname]').val();
                if(catname.length<2){

                    layer.msg('栏目标题长度不得小于2位');
                    return false;
                }
                var data = $('#form1').serializeArray();
                $.post('{{route('admin.category.update')}}',data,function (j) {
                    var obj=JSON.parse(j);
                    console.log(obj.success);
                    cate_list=obj.cate_list;
                    if(JSON.parse(obj.success).success==true){
                        layer.msg('修改成功！');
                        $.jstree.destroy();
                        setTimeout(function(){
                            layer.closeAll('loading');
                        }, 1000);
                        setTimeout(function () {
                            $('#using_json').jstree({
                                'core': {
                                    'data': cate_list
                                }
                            });

                            $('#using_json').on('changed.jstree',function(e,data) {
//当前选中节点的id

                                console.log(data.instance.get_node(data.selected[0]).id);
                                var domId = data.instance.get_node(data.selected[0]).id;
                                var dotext=data.instance.get_node(data.selected[0]).text;
                               if(domId>0){
                                   $.post('admin/category-ajax-cate/'+domId,{'_token':'{{csrf_token()}}'},function (o) {
                                       var data = JSON.parse(o);
                                       if(data.id>0){
                                           $('input[name=id]').val(data.id);
                                           $('input[name=pid]').val(data.pid);
                                           $('input[name=catname]').val(data.catname);
                                           $('#pname-v').val(data.pname);
                                           $('input[name=pname]').val(data.pname);
                                           $('input[name=alias]').val(data.alias);
                                           $('input[name=encatname]').val(data.encatname);
                                           $("input[name='display']").each(function(){

                                               if($(this).val() == data.display){
                                                   $(this).prop( "checked", true );
                                               }
                                           });

                                           $('input[name=img]').val(data.img);
                                           $('#slt').attr('src',data.img);
                                           $('input[name=url]').val(data.url);
                                           $('input[name=sort]').val(data.sort);
                                           $("#models").find("option[value="+data.model+"]").prop("selected",true);
                                           $("input[name='type']").each(function(){
                                               if($(this).val() == data.type){
                                                   $(this).prop( "checked", true );
                                               }
                                           });

                                           $('input[name=index_view]').val(data.index_view);
                                           $('input[name=list_view]').val(data.index_view);
                                           $('input[name=page_view]').val(data.index_view);

                                           $('#add-cate').css('display','inline');
                                           $('#updatebody').css('display','block');
                                           $('#del-cate').css('display','inline');
                                       }

                                   })
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
            if(domId>0){
                $.post('admin/category-ajax-cate/'+domId,{'_token':'{{csrf_token()}}'},function (o) {
                    var data = JSON.parse(o);
                    if(data.id>0){
                        $('input[name=id]').val(data.id);
                        $('input[name=pid]').val(data.pid);
                        $('input[name=catname]').val(data.catname);
                        $('input[name=pname]').val(data.pname);
                        $('input[name=alias]').val(data.alias);
                        $('input[name=encatname]').val(data.encatname);
                        $('#pname-v').val(data.pname);

                        $("input[name='display']").each(function(){

                            if($(this).val() == data.display){
                                console.log($(this).val());
                                $(this).attr( "checked", 'checked' );
                            }
                        });

                        $('input[name=img]').val(data.img);
                        $('#slt').attr('src',data.img);
                        $('input[name=url]').val(data.url);
                        $('input[name=sort]').val(data.sort);
                        $("#models").find("option[value="+data.model+"]").prop("selected",true);
                        $("input[name='type']").each(function(){
                            if($(this).val() == data.type){
                                $(this).prop( "checked", true );
                            }
                        });

                        $('input[name=index_view]').val(data.index_view);
                        $('input[name=list_view]').val(data.index_view);
                        $('input[name=page_view]').val(data.index_view);

                        if(data.content){
                            ue.setContent(data.content);
                        }

                        $('#update-cate').css('display','inline');
                        $('#updatebody').css('display','block');
                        $('#del-cate').css('display','inline');
                    }

                })
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


        $(document).ready(function () {

            $('#using_json').jstree({
                'core': {
                    'data':{!!$cate_json!!}
                }
            });
        });
    </script>

@endsection