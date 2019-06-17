<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{--添加的--}}
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/demo.css')}}" />
<!--必要样式-->
<link rel="stylesheet" type="text/css" href="{{asset('css/component.css')}}" />
{{----}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CUCHUB') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{--添加的--}}
    {{--<meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">--}}
    {{--<meta name="author" content="Vincent Garreau" />--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">--}}
    {{--<link rel="stylesheet" media="screen" href="{{asset('css/style.css')}}">--}}
    {{----}}
</head>
<body>
    {{--添加的--}}
    {{--<div id="particles-js"></div>--}}
    {{--<!-- scripts -->--}}
    {{--<script src="{{asset('js/particles.min.js')}}"></script>--}}
    {{--<script src="{{asset('js/app.js')}}"></script>--}}
    {{----}}
    <div id="app" class="{{ route_class() }}-page">
        @include('layouts._header')

        {{--  在导航下面，内容上面导入  --}}
        @include('components._message')

        <main class="py-4">
            @yield('content')
        </main>
        @include('layouts._footer')
    </div>
    {{--<div class="container demo-1">--}}
        {{--<div class="content">--}}
            {{--<div id="large-header" class="large-header">--}}
                {{--<canvas id="demo-canvas"></canvas>--}}
                {{--<div class="logo_box">--}}
                    {{--<h3>欢迎你</h3>--}}
                    {{--<form action="#" name="f" method="post">--}}
                        {{--<div class="input_outer">--}}
                            {{--<span class="u_user"></span>--}}
                            {{--<input name="logname" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户">--}}
                        {{--</div>--}}
                        {{--<div class="input_outer">--}}
                            {{--<span class="us_uer"></span>--}}
                            {{--<input name="logpass" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">--}}
                        {{--</div>--}}
                        {{--<div class="mb2"><a class="act-but submit" href="javascript:;" style="color: #FFFFFF">登录</a></div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div><!-- /container -->--}}
    {{--<script src="{{asset('js/TweenLite.min.js')}}"></script>--}}
    {{--<script src="{{asset('js/EasePack.min.js')}}"></script>--}}
    {{--<script src="{{asset('js/rAF.js')}}"></script>--}}
    {{--<script src="{{asset('js/demo-1.js')}}"></script>--}}
    <script>
        function deleteConfirm(id) {
            var confirm = window.confirm('确认要删除这篇文章吗？');
            if(confirm === true) {
                $("#delete-post-" + id).submit(); //提交表单
            }else {
                window.alert('你选择不删除！');
            }
        }
    </script>
    <script>
        function deleteConfirm2(id) {
            var confirm = window.confirm('确认要删除这个评论吗？');
            if(confirm === true) {
                $("#delete-comment-" + id).submit(); //提交表单
            }else {
                window.alert('你选择不删除！');
            }
        }
    </script>
</body>
</html>
{{--test2@qq.com wy123456--}}