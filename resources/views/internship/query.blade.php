@extends('common.layouts')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">查询结果</div>

        <table class="table table-striped table-hover table-responsive" style="width: 1000px; height:600px;">

            <thead>
            <tr>
                <th>ID</th>
                <th>岗位名称</th>
                <th>公司</th>
                <th>发布人</th>
                <th>发布时间</th>
            </tr>
            </thead>
            <tbody>
            @foreach($internships as $internship)
                <tr>
                    <th scope="row">{{$internship->Id}}</th>
                    <td>{{$internship->name}}</td>
                    <td>{{$internship->company}}</td>
                    <td>{{$internship->boss}}</td>
                    <td>{{$internship->created_at}}</td>
                    <td></td>
                    <td>
                    <td>
                        <a href="{{url('internship/detail',['id'=>$internship->Id])}}">详情</a>
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