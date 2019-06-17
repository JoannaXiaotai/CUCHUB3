
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>internship @yield('title')</title>
    <!-- Bootstrap CSS 文件 -->
    <link rel="stylesheet" href="{{asset('static/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/demo.css')}}" />
    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/component.css')}}" />
    <title>{{ config('app.name', 'CUCHUB') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @section('style')
    @show

</head>
<body>
<!-- 头部 -->
@include('layouts._header')
<!-- 中间内容区局 -->
<div class="container" style="height:800px;width:1600px;background:#dedebc;opacity:0.9;" >
    <div class="row">

        <!-- 左侧菜单区域   -->
        <div class="col-md-3">
            @section('leftmenu')
                &nbsp&nbsp&nbsp&nbsp
                <div>
                    <form>
                        <input type="text" name="keyword" value="{{Request::input('keyword')}}">
                        <span>
            <button type="submit">搜索</button>
        </span>
                    </form>
                </div>
                &nbsp&nbsp&nbsp&nbsp
                <div class="list-group" >

                    <a href="{{url('internship/index')}}" class="list-group-item
                  {{Request::getPathInfo()=='/internship/index'?'active ':''}}">招聘信息列表</a>
                    <a href="{{url('internship/create')}}" class="list-group-item
                  {{Request::getPathInfo()=='/internship/create'?'active':''}}">发布新的实习</a>
                    <a href="{{url('internship/mycreate')}}" class="list-group-item
                  {{Request::getPathInfo()=='/internship/mycreate'?'active ':''}}">我发布的</a>


                </div>
            @show
        </div>

        <!-- 右侧内容区域 -->
        <div class="col-md-9">
            &nbsp&nbsp&nbsp&nbsp
            @yield('content')
        </div>
    </div>
</div>

<!-- 尾部 -->
@section('footer')
    <div class="jumbotron" style="margin:0;">
        <div class="container">
            <span>  @实习、兼职</span>
        </div>
    </div>
@show

<!-- jQuery 文件 -->
<script src="{{asset('static/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap JavaScript 文件 -->
<script src="{{asset('static/bootstrap/js/bootstrap.min.js')}}"></script>

@section('javascript')
@show
</body>
</html>