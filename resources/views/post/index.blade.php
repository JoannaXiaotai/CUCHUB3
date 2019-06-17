@extends('layouts.app')

@section('content')

    {{--  上面说过这里会添加一个按钮  --}}
    {{-- route('路由别名') 在视图上就是一个指向 BlogController@create 的链接 --}}
    <div class="container">
        <div class="row justify-content-center">
            <a href="{{ route('post.create')}}" class="dropdown-item"> 添加文章 </a>
        </div>
        {{--<a href="{{ route('post.create') }}" class="dropdown-item"> 添加文章 </a>--}}
        {{--<a href="{{ route('blog.index') }}" class="btn btn-lg btn-block btn-primary">点击这里查看我的博客</a>--}}
        {{--搜索--}}
        <div class="row justify-content-center">
            <form>
                <input type="text" name="keyword" value="{{Request::input('keyword')}}">
                <span>
                        <button type="submit">搜索帖子</button>
                    </span>
            </form>
        </div>
    </div>
    <br><br><br>
    {{--搜索--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="row mb-5">
                <div class="col-lg-9 col-md-9 topic-list">
                    @if (isset($category))
                        <div class="alert alert-info" role="alert">
                            {{ $category->name }} ：{{ $category->description }}
                        </div>
                    @endif
            <div class="card">
                <div class="card-header">广场</div>
                <!-- Left Side Of Navbar -->
                <meta name="author" content="" />
                <meta name="description" content="" />
                <meta name="Copyright" content="" />
                <link rel="stylesheet" href="{{asset('css/nav_menu3.css')}}" type="text/css" media="all" />
                <div class="nav_menu3">
                    <ul>
                        <li class="nav-has-sub"><a href="{{ route('post.index') }}">话题</a>
                            <ul>
                                <li><a href="{{ route('categories.show', 1) }}">分享</a></li>
                                <li><a href="{{ route('categories.show', 2) }}">教程</a></li>
                                <li><a href="{{ route('categories.show', 3) }}">问答</a></li>
                                <li><a href="{{ route('categories.show', 4) }}">公告</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    {{----}}
                    <div class="card-body">
                        {{-- 话题列表 --}}
                        @include('post._post_list', ['posts' => $posts])
                        {{-- 分页 --}}
                        <div class="mt-5">
                            {!! $posts->appends(Request::except('page'))->render() !!}
                        </div>
                    </div>
                    {{--<table class="table table-hover table-bordered">--}}
                        {{--<thead class="bg-info">--}}
                        {{--<tr>--}}
                            {{--<th>标题</th>--}}
                            {{--<th>发布时间</th>--}}
                            {{--<th>发帖人</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{-- 这里通过 @foreach 遍历数据 --}}{{-- @foreach ($posts as $post)--}}
                            {{--<tr>--}}
                                {{--<td><a href="{{route('post.show',['post'=>$post['id']])}}">{{ $post->title }}</a></td>--}}
                                {{--<td>{{ $post->created_at }}</td>--}}
                                {{--<td>{{$post->userName()}}</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        {{--</tbody>--}}
                        {{--<tfoot>--}}
                        {{-- 这里通过 $blogs->links() 来显示分页按钮 --}}{{-- {{ $posts->links() }}--}}
                        {{--</tfoot>--}}
                    {{--</table>--}}
                </div>
            </div>
                </div>
        </div>
    </div>
@endsection