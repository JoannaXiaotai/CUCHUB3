<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CUCHUB</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        {{--添加的--}}
        <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
        <meta name="author" content="Vincent Garreau" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" media="screen" href="{{asset('css/style.css')}}">
        {{----}}
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">首页</a>
                    @else
                        <a href="{{ route('login') }}">登录</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">注册</a>
                        @endif
                    @endauth
                </div>
            @endif

            {{--<div class="content">--}}
                {{--<div class="title m-b-md">--}}
                    {{--Laravel--}}
                {{--</div>--}}

                {{--<div class="links">--}}
                    {{--<a href="https://laravel.com/docs">Docs</a>--}}
                    {{--<a href="https://laracasts.com">Laracasts</a>--}}
                    {{--<a href="https://laravel-news.com">News</a>--}}
                    {{--<a href="https://blog.laravel.com">Blog</a>--}}
                    {{--<a href="https://nova.laravel.com">Nova</a>--}}
                    {{--<a href="https://forge.laravel.com">Forge</a>--}}
                    {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
        {{--添加的--}}
        {{--<div id="particles-js"></div>--}}
        {{--<!-- scripts -->--}}
        {{--<script src="{{asset('js/particles.min.js')}}"  async></script>--}}
        {{--<script src="{{asset('js/app.js')}}"  async></script>--}}
        {{--上面那个async强--}}
        {{----}}
    </body>
</html>
