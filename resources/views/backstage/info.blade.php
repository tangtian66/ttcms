@extends('backstage.layouts.empty')
@section('title','网站参数')
@section('content')


    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>系统参数</h5>
                </div>
                <div class="ibox-content">

                    <form class="form-horizontal" id="form1">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">网站标题</label>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="col-sm-10">
                                <input type="text" name="title" value="{{$title}}" class="form-control">
                                <span class="help-block m-b-none">&#123;&#123;info['title']&#125;&#125;</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">企业名称</label>
                            <div class="col-sm-10">
                                <input type="text" name="enterprise" value="{{$enterprise}}" class="form-control">
                                <span class="help-block m-b-none">&#123;&#123;info['enterprise']&#125;&#125;</span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">联系电话-1</label>

                            <div class="col-sm-10">
                                <input type="text" name="mobile1" value="{{$mobile1}}" class="form-control">
                                <span class="help-block m-b-none">&#123;&#123;info['mobile1']&#125;&#125;</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">联系电话-2</label>

                            <div class="col-sm-10">
                                <input type="text" name="mobile2" value="{{$mobile2}}" class="form-control">
                                <span class="help-block m-b-none">&#123;&#123;info['mobile2']&#125;&#125;</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">联系电话-3</label>

                            <div class="col-sm-10">
                                <input type="text" name="mobile3" value="{{$mobile3}}" class="form-control">
                                <span class="help-block m-b-none">&#123;&#123;info['mobile3']&#125;&#125;</span>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-sm-2 control-label">企业邮箱</label>

                            <div class="col-sm-10">
                                <input type="text" name="email" value="{{$email}}" class="form-control">
                                <span class="help-block m-b-none">&#123;&#123;info['email']&#125;&#125;</span>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-sm-2 control-label">企业地址</label>

                            <div class="col-sm-10">
                                <input type="text" name="address" value="{{$address}}" class="form-control">
                                <span class="help-block m-b-none">&#123;&#123;info['address']&#125;&#125;</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">网站关键词</label>

                            <div class="col-sm-10">
                                <input type="text" name="keywords" value="{{$keywords}}" class="form-control">
                                <span class="help-block m-b-none">&#123;&#123;info['keywords']&#125;&#125;</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">网站描述</label>
                            <div class="col-sm-10">
                                <input type="text" name="description" value="{{$description}}" class="form-control">
                                <span class="help-block m-b-none">&#123;&#123;info['description']&#125;&#125;</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">首页模版</label>
                            <div class="col-sm-10">
                                <input type="text" name="index" value="{{$index}}" class="form-control">
                                <span class="help-block m-b-none">&#123;&#123;info['index']&#125;&#125;</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">版权所有</label>
                            <div class="col-sm-10">
                                <input type="text" name="copyright" value="{{$copyright}}" class="form-control">
                                <span class="help-block m-b-none">&#123;&#123;info['copyright']&#125;&#125;</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">备案信息</label>
                            <div class="col-sm-10">
                                <input type="text" name="icp" value="{{$icp}}" class="form-control">
                                <span class="help-block m-b-none">&#123;&#123;info['icp']&#125;&#125;</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">移动端模版</label>

                            <div class="col-sm-10" style="top:5px;">
                                <input type="checkbox" value="1" @if($wap==1) checked  @endif name="wap"> 启用（响应式网站禁用）

                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="button">保存内容</button>
                                <button class="btn btn-white" type="button">取消</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>

@endsection
@section('myjs')
<script>
    $(".btn-primary").click(function () {
        var data=$("#form1").serializeArray();
        $.post('{{route('admin.info')}}',data,function (j) {
            var obj=JSON.parse(j);
            if(obj.success==1){
                layer.msg('修改成功！');
            }
        });
    });

</script>
@endsection