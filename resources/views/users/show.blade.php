@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')

    <div class="row">

        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
            <div class="card ">
                {{--<img class="card-img-top" src="https://iocaffcdn.phphub.org/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/600/h/600" alt="{{ $user->name }}">--}}
                 @if($user->avatar)
                <img class="card-img-top" src="{{ $user->avatar }}" alt="{{ $user->name }}">
                @endif
                <div class="card-body">
                    <h5><strong>个人简介</strong></h5>
                    <p>{{ $user->introduction }}</p>
                    <hr>
                    <h5><strong>注册于</strong></h5>
                    <p>{{ $user->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="card ">
                <div class="card-body">
                    <h1 class="mb-0" style="font-size:22px;">{{ $user->name }}          <small class='float-right'>邮箱：{{ $user->email }}</small></h1>
                </div>
            </div>
            <hr>

            {{-- 用户发布的内容 --}}
             {{--用户发布的内容--}}
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link bg-transparent {{ active_class(if_query('tab', null)) }}" href="{{ route('users.show', $user->id) }}">
                                {{$user->name}} 的话题
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-transparent {{ active_class(if_query('tab', null)) }}" href="{{ route('users.show',[$user->id, 'tab' => 'comments']) }}">
                                {{$user->name}} 的评论
                            </a>
                        </li>



                    </ul>
                    @if (if_query('tab', 'comments'))
                         @include('users._comments', ['comments' => $user->comments()->with('post')->paginate(5)])
                     @else
                         @include('users._posts', ['posts' => $user->posts()->paginate(5)])
                     @endif

                </div>
            </div>
            {{--@if (if_query('tab', 'comments'))--}}
                {{--@include('users._comments', ['comments' => $user->comments()->with('post')->paginate(5)])--}}
            {{--@else--}}
                {{--@include('users._posts', ['posts' => $user->posts()->paginate(5)])--}}
            {{--@endif--}}
        </div>
    </div>
@stop
