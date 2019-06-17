@extends('common.layouts')
@section('content')
    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading">招聘详情</div>

        <table class="table table-bordered table-striped table-hover " style="height:600px;">
            <tbody>
            <tr>
                <td width="10%">ID</td>
                <td>{{$internship->Id}}</td>
            </tr>
            <tr>
                <td width="10%">岗位名称</td>
                <td>{{$internship->name}}</td>
            </tr>
            <tr>
                <td width="10%">公司</td>
                <td>{{$internship->company}}</td>
            </tr>
            <tr style="height:200px;">
                <td width="10%">详情</td>
                <td>{{$internship->detail}}</td>
            </tr>
            <tr>
                <td>联系方式</td>
                <td>{{$internship->contact}}</td>
            </tr>
            <tr>
                <td>HR</td>
                <td>{{$internship->boss}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@stop
