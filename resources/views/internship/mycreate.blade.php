@extends('common.layouts')
@section('content')
    @include('common.validator')
    <div class="panel panel-default" style="width:800px;">
        <div class="panel-heading">我发布的</div>
        <table class="table table-bordered table-striped table-hover " style="height:600px;">
            <thead>
            <tr>
                <th>ID</th>
                <th>岗位名称</th>
                <th>公司</th>

                <th>发布时间</th>
            </tr>
            </thead>
            <tbody>
            @foreach($internships as $internship)
                <tr>
                    <th scope="row">{{$internship->Id}}</th>
                    <td>{{$internship->name}}</td>
                    <td>{{$internship->company}}</td>
                    <td>{{$internship->created_at}}</td>
                    <td>
                    <td>
                        <a href="{{url('internship/detail',['id'=>$internship->Id])}}">详情</a>
                        <a href="{{url('internship/update',['id'=>$internship->Id])}}">修改</a>
                        <a href="{{url('internship/destroy',['id'=>$internship->Id])}}" onclick="if(confirm('你确定要删除？')==false)return false;">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- 分页  -->
    <div>
        <div class="pagination pull-right">
            {{$internships->render()}}
        </div>
    </div>
    @stop