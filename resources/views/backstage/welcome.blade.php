@extends('backstage.layouts.empty')
@section('title','欢迎访问')
@section('content')
    <div class="row">
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">条</span>
                    <h5>站内新闻</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">40,200</h1>
                    <div class="stat-percent font-bold text-success">
                    </div>
                    <small>总条数</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">全年</span>
                    <h5>订单</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">275,800</h1>
                    <div class="stat-percent font-bold text-info">
                    </div>
                    <small>总条数</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">全部</span>
                    <h5>会员</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">106,120</h1>
                    <div class="stat-percent font-bold text-navy">
                    </div>
                    <small>总条数</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">最近一个月</span>
                    <h5>活跃用户</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">80,600</h1>
                    <div class="stat-percent font-bold text-danger">
                    </div>
                    <small>总条数</small>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>系统参数</h5>

                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">

                            <tbody>
                            <tr>
                                <th class="text-nowrap">操作系统</th>
                                <td colspan="4">{{$os_info['操作系统']}}</td>
                            </tr>

                            <tr>
                                <th class="text-nowrap">运行环境</th>
                                <td colspan="4">{{$os_info['运行环境']}}</td>
                            </tr>


                            <tr>
                                <th class="text-nowrap">上传附件限制</th>
                                <td colspan="4">{{$os_info['上传附件限制']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap">执行时间限制</th>
                                <td colspan="4">{{$os_info['执行时间限制']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap">服务器时间</th>
                                <td colspan="4">{{$os_info['服务器时间']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap">磁盘剩余空间</th>
                                <td colspan="4">{{$os_info['剩余空间']}}M</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap">浏览器信息</th>
                                <td colspan="4">{{$os_info['浏览器信息']}}</td>
                            </tr>


                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>

    </div>

@endsection