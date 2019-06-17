@extends('layouts.app')

{{--@section('scripts')--}}
{{--    @append--}}
{{--        .my-carousel{--}}
{{--            width:--}}
{{--        }--}}
{{--    @stop--}}
{{--@endsection--}}

@section('content')
    <meta name="referrer" content="never">
    <!-- 新 Bootstrap4 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>

    <!-- popper.min.js 用于弹窗、提示、下拉菜单 -->
    <script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>

    <!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="http://localhost:82/css/book/index.css"/>
    <link rel="stylesheet" href="http://localhost:82/css/book/iconfont/iconfont.css"/>

    <div class="container">

        <form>
            <input type="text" name="keyword" value="{{Request::input('keyword')}}">
            <span>
                        <button type="submit">搜索图书</button>
                    </span>
        </form>
        <a href="{{ url('book/create') }}" type="submit">发布图书</a>

        <div class="row justify-content-center">
            <div class="row clearfix">
                <div class="col-md-1 column">
                </div>
                <div class="col-md-10 column">
                    {{--轮播--}}
                    <div class="bd-example">
                        <div id="carouselExampleCaptions" class="carousel slide my-carousel" data-ride="carousel">
                            {{--                            <ol class="carousel-indicators">--}}
                            {{--                                @foreach($recommendBooks as $key=>$recommendBook)--}}
                            {{--                                    <li data-target="#carouselExampleCaptions" data-slide-to="{{$key}}" class="active"></li>--}}
                            {{--                                @endforeach--}}
                            {{--                            </ol>--}}
                            <div class="carousel-inner">
                                @foreach($recommendBooks as $key=>$recommendBook)
                                    @if ($key==0)
                                        <div class="carousel-item active my-carousel-item">
                                            <div class="jumbotron jumbotron-box-left my-jumbotron">
                                                <div class="row">
                                                    <div class="col-md-4 column">
                                                        <img src="{{$recommendBook->book_pic_large}}" style="width:80px;height:120px">
                                                    </div>
                                                    <div class="col-md-8 column">
                                                        <h5>{{ $recommendBook['book_name'] }}</h5>
                                                        <p class = "description">{{ str_limit($recommendBook['book_summary'], 200,'...') }}</p>
                                                    </div>
                                                </div>
                                                <hr style="background-color:white">
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <a href="" class="btn btn-default btn-sm">
                                                        <div class = "iconfont icon-goumai">购买</div>
                                                    </a>
                                                    @if(Auth::user())
                                                        <a href="{{ route('books.add_to_wish_list',[$recommendBook['book_id']])}}" class="btn btn-default btn-sm">
                                                            <div class = "iconfont icon-shoucang"> 收藏</div>
                                                        </a>
                                                    @else
                                                        <a href="/login" class="btn btn-default btn-sm">
                                                            <div class = "iconfont icon-shoucang"> 收藏</div>
                                                        </a>
                                                    @endif
                                                    <a href="" class="btn btn-default btn-sm">
                                                        <div class = "iconfont icon-yanjing"> 查看更多</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="carousel-item my-carousel-item">
                                            <div class="jumbotron jumbotron-box-left my-jumbotron">
                                                <div class="row clearfix">
                                                    <div class="col-md-4 column">
                                                        <img src="{{$recommendBook->book_pic_large}}" style="width:80px;height:120px">
                                                    </div>
                                                    <div class="col-md-8 column">
                                                        <h5>{{ $recommendBook['book_name'] }}</h5>
                                                        <p class = "description">{{ str_limit($recommendBook['book_summary'], 200,'...') }}</p>
                                                    </div>
                                                </div>
                                                <hr style="background-color:white">
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <a href="" class="btn btn-default btn-sm">
                                                        <div class = "iconfont icon-goumai">购买</div>
                                                    </a>
                                                    @if(Auth::user())
                                                        <a href="{{ route('books.add_to_wish_list',[$recommendBook['book_id']])}}" class="btn btn-default btn-sm">
                                                            <div class = "iconfont icon-shoucang"> 收藏</div>
                                                        </a>
                                                    @else
                                                        <a href="/login" class="btn btn-default btn-sm">
                                                            <div class = "iconfont icon-shoucang"> 收藏</div>
                                                        </a>
                                                    @endif
                                                    <a href="" class="btn btn-default btn-sm">
                                                        <div class = "iconfont icon-yanjing"> 查看更多</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <ol class="carousel-indicators" style="position:relative">
                                @foreach($recommendBooks as $key=>$recommendBook)
                                    <li data-target="#carouselExampleCaptions" data-slide-to="{{$key}}" class="active"></li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                    {{--首页 书籍展示--}}
                    <div class="d-flex flex-row">
                        @foreach($books as$key=>$book)
                            <div class="p-2 .flex-fill card my-card">
                                {{--首页 书籍小卡--}}
                                <img class="card-img-top my-img-small" src="{{$book->book_pic_small}}">
                                <div class="card-body">
                                    <h5 class="card-title">{{$book->book_name}}</h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">作者：{{$book->book_author_name}}</li>
                                    <li class="list-group-item">出版社：{{$book->book_publisher}}</li>
                                    <li class="list-group-item">出版日期：{{$book->book_publish_year}}</li>
                                    {{--                                <li class="list-group-item">库存：{{$released_book_num}}</li>--}}
                                </ul>
                                <div class="card-body">
                                    <a href="{{ route('books.add_to_wish_list',[$recommendBook['book_id']])}}" class="card-link">想要</a>
                                    <a href="#" class="card-link">购买</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex flex-row">
                        @foreach($releasedBooks as$key=>$releasedBook)
                            <div class="p-2 .flex-fill card my-card">
                                {{--首页 书籍小卡--}}
                                <img class="card-img-top my-img-small" src="{{$releasedBook["belongBook"]['book_pic_small']}}">
                                <div class="card-body">
                                    <h5 class="card-title">{{$releasedBook["belongBook"]['book_name']}}</h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">作者：{{$releasedBook["belongBook"]['book_author_name']}}</li>
                                    <li class="list-group-item">出版社：{{$releasedBook["belongBook"]['book_publisher']}}</li>
                                    <li class="list-group-item">出版日期：{{$releasedBook["belongBook"]['book_publish_year']}}</li>
                                    <li class="list-group-item">发布者：{{$releasedBook["releaser"]['name']}}</li>
                                    <li class="list-group-item">市场价：{{$releasedBook["belongBook"]['book_market_price']}}
                                        二手价：{{$releasedBook->price}}</li>
                                    {{--                                <li class="list-group-item">库存：{{$released_book_num}}</li>--}}
                                </ul>
                                <div class="card-body">
                                    <a href="{{ route('released_books.add_to_wish_list',[$recommendBook['book_id']])}}" class="card-link">想要</a>
                                    <a href="#" class="card-link">购买</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-1 column">
                </div>
            </div>
        </div>
    </div>
@endsection