@extends('backstage.layouts.empty')
@section('title','栏目管理')
@section('mycss')
    <link href="{{URL::asset('backstage/css/plugins/bootstrap-table/bootstrap-table.min.css')}}" rel="stylesheet">
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-push-11">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>栏目管理</h5>
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

                    <div style="margin:20px">
                        <input type="button" id="expandAllTree" value="展开所有"  class="btn btn-defaul"/>
                        <input type="button" id="collapseAllTree" value="折叠所有" class="btn btn-defaul"/>
                        <button id="getrow">获取选中行</button>
                        <table id="tree_table"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('myjs')
<script src="{{URL::asset('backstage/js/plugins/bootstrap-table/bootstrap-table.min.js')}}"></script>
<script src="https://cdn.bootcss.com/jquery-treegrid/0.2.0/js/jquery.treegrid.bootstrap3.min.js"></script>
<script>
    $(function () {

        $('#tree_table').bootstrapTable({
            class: 'table table-hover table-bordered',
            url:'{{route('admin.category.list')}}',
            contentType: 'application/x-www-form-urlencoded; charset=utf-8',
            // data: data,
            sidePagination: 'server',
            pagination: false,
            treeView: true,
            treeId: "id",
            treeField: "id",
            rowAttributes: function (row, index) {
                return {
                    xx:index
            };

            },

            queryParams : function(params) {
                var param = {
                    roleId : 'xx'
                };
                return param;
            },
            columns: [{

                checkbox:true
            },
                {
                    field: 'id',
                    title: 'id',
                },
                {
                field: 'name',
                title: '名称',
            },
                {
                    field: 'desc',
                    title: '详情',
                },
            ]
        });
        $("#expandAllTree").on('click',function(){
            $('#tree_table').bootstrapTable("expandAllTree")
        });
        $("#collapseAllTree").on('click',function(){
            $('#tree_table').bootstrapTable("collapseAllTree")
        });

        $("#getrow").on('click',function () {

            var dd=$("#tree_table").bootstrapTable('getSelections');
             console.log(dd);
        });

    });




</script>



@endsection