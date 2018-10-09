@extends('backstage.layouts.empty')
@section('title','相册列表')
@section('mycss')
    <link href="{{URL::asset('backstage/css/plugins/bootstrap-table/bootstrap-table.min.css')}}" rel="stylesheet">
@endsection
@section('content')

    <div class="row"><div class="col-sm-push-11"> <div class="ibox-content"><button type="button" class="btn btn-primary " data-uri="{{route('admin.album.add')}}" data-id="" onclick="leopen(this)">添加相册</button></div></div>
    </div>

    <div class="row">
        <div class="col-sm-push-11">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
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
                    <!-- Example Toolbar -->
                    <div class="example-wrap">

                        <div class="example">
                            <div id="toolbar"></div>
                            <table id="exampleTableToolbar">

                            </table>
                        </div>
                    </div>
                    <!-- End Example Toolbar -->

                </div>
            </div>
        </div>
    </div>

@endsection

@section('myjs')
    <script src="{{URL::asset('backstage/js/plugins/bootstrap-table/bootstrap-table.min.js')}}"></script>
    <script src="{{URL::asset('backstage/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js')}}"></script>
    <script src="{{URL::asset('backstage/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js')}}"></script>

    <script>

        function del(o){
            var id=$(o).data('id');
            if(id>0){
                layer.confirm('真的要删除吗？', {
                    btn: ['确认','取消'] //按钮
                }, function(){
                    $.post('{{route('admin.album.del')}}',{'id':id,"_token":'{{csrf_token()}}'},function (o) {
                        var obj=JSON.parse(o);
                        if(obj.success){
                            layer.msg('删除成功', {icon: 1});
                            setTimeout(function () {
                                location.reload();
                            },1000);
                        }else{
                            layer.msg('网络不稳定请手动刷新后重试', {icon: 2});
                        }
                    });

                }, function(){
                    layer.msg('取消操作', {icon: 2});
                });
            }
        }

        function leopen(o){
             var uri=$(o).data('uri');
             var id=$(o).data('id');
             uri=uri+id;
            layer.open({
                type: 2,
                title: '编辑',
                shadeClose: true,
                shade: false,
                maxmin: true, //开启最大化最小化按钮
                area: ['80%', '95%'],
                content: uri
             });
        }

        $(function () {
            var oTable = new TableInit();
            oTable.Init();
        });


        var TableInit = function () {
            var oTableInit = new Object();
            //初始化Table
            oTableInit.Init = function () {
                $('#exampleTableToolbar').bootstrapTable({
                    url: '{{route('admin.album.getdate')}}',         //请求后台的URL（*）
                    method: 'get',                      //请求方式（*）
                    toolbar: '#toolbar',                //工具按钮用哪个容器
                    striped: true,                      //是否显示行间隔色
                    cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
                    pagination: true,                   //是否显示分页（*）
                    sortable: false,                     //是否启用排序
                    sortOrder: "asc",                   //排序方式
                    queryParams: oTableInit.queryParams,//传递参数（*）
                    sidePagination: "client",           //分页方式：client客户端分页，server服务端分页（*）
                    pageNumber: 1,                       //初始化加载第一页，默认第一页
                    pageSize: 10,                       //每页的记录行数（*）
                    pageList: [10, 25, 50, 100],        //可供选择的每页的行数（*）
                    search: true,                       //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
                    contentType: "application/x-www-form-urlencoded",
                    strictSearch: true,
                    showColumns: true,                  //是否显示所有的列
                    showRefresh: true,                  //是否显示刷新按钮
                    minimumCountColumns: 1,             //最少允许的列数
                    clickToSelect: true,                //是否启用点击选中行
                    //height: 700,                        //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
                    uniqueId: "no",                     //每一行的唯一标识，一般为主键列
                    showToggle: true,                    //是否显示详细视图和列表视图的切换按钮
                    cardView: false,                    //是否显示详细视图
                    detailView: false,                   //是否显示父子表
                    columns: [
                        {
                            field: 'id',
                            title: 'ID'
                        }, {
                            field: 'albumtitle',
                            title: '相册名称'
                        },
                        {
                            field: 'operate',
                            title: '操作',
                            formatter: operateFormatter //自定义方法，添加操作按钮
                        }
                    ]

                });

            };


            //得到查询的参数
            oTableInit.queryParams = function (params) {
                var temp = {   //这里的键的名字和控制器的变量名必须一直，这边改动，控制器也需要改成一样的
                    limit: params.limit,   //页面大小
                    offset:params.offset
                };
                return temp;
            };
            return oTableInit;
        };


        function operateFormatter(value, row, index) {//赋予的参数

            return [
                '<button  class="btn btn-outline btn-info" type="button" onclick="leopen(this)" data-id="'+row.id+'" data-uri="admin/album-update/">编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                '<button class="btn btn-outline btn-danger" type="button" data-id="'+row.id+'"  onclick="del(this)">删除</button>',
            ].join('');
        }
    </script>

@endsection