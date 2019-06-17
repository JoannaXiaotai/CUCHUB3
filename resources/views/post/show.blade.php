@extends('layouts.app')

@section('content')
    @include('components._error')
    <div class="container">
        <div class="container">
            <div class="row justify-content-center">
                <a href="{{ route('post.index')}}" class="dropdown-item"> 返回 </a>
                <a href="{{ route('post.create')}}" class="dropdown-item"> 添加文章 </a>
            </div>
            {{--<a href="{{ route('post.create') }}" class="dropdown-item"> 添加文章 </a>--}}
            {{--<a href="{{ route('blog.index') }}" class="btn btn-lg btn-block btn-primary">点击这里查看我的博客</a>--}}

        </div>
        <br><br><br>
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">帖子详情</div>
                {{--<a href="{{ route('post.edit', $post->id) }}" class="btn btn-info">编辑文章</a>--}}
                {{--<a href="javascript:deleteConfirm({{ $post->id }});" class="btn btn-danger btn-sm">删除文章</a>--}}

                {{--  因为删除也需要 csrf 令牌认证，所以弄个表单  --}}
                {{--<form method="POST" action="{{ route('post.destroy', $post->id) }}" id="delete-post-{{ $post->id }}">--}}
                    {{--@csrf--}}
                    {{--  这里伪造DELETE请求  --}}
                    {{--@method("DELETE")--}}
                {{--</form>--}}
                {{--@can('update',$post)--}}
                @can('update',$post)
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-info">修改</a>
                    <a href="javascript:deleteConfirm({{ $post->id }});" class="btn btn-danger btn-sm">删除</a>

                    {{--  因为删除也需要 csrf 令牌认证，所以弄个表单  --}}
                    <form method="POST" action="{{ route('post.destroy', $post->id) }}" id="delete-post-{{ $post->id }}">
                        @csrf
                        {{--  这里伪造DELETE请求  --}}
                        @method("DELETE")
                    </form>
                @endcan
                {{--@endcan--}}
                <div class="card-body">
                    <h1 class="text-center">{{ $post->title }}</h1>
                    {{--<p>发布人{{$post->userName()}}</p>--}}
                    <p>发布时间<small>{{ $post->created_at }}</small></p>
                    <p>发布人{{$post->userName()}}</p>
                    <hr>

                    <p> {{ $post->content }} </p>
                </div>
                <form method="POST" action="{{ route('comment.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    <div class="form-group">
                        <label for="content"></label>
                        {{-- 样式里面加一个判断，判断是否有关于content的错误有的话给样式给文本域加一个红边边 --}}
                        <textarea id="content" class="form-control {{ $errors->has('content') ? ' is-invalid' : '' }}" cols="30" rows="10" name="content">你对该贴有什么看法呢？</textarea>
                        {{-- 如果有错误，再显示一个小的错误提示信息 --}}
                        @if ($errors->has('content'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button class="btn btn-primary" type="submit">发表评论</button>
                </form>

                <h3>评论</h3>
                <ul>
                    @foreach ($comments as $comment)
                        {{--<li><small>{{ $comment->userName() }} 评论说：</small>“ {{ $comment->content }} ”</li>--}}
                        {{--<li><small>{{ $comment->userName() }} 评论说：</small>“ {{ $comment->content }} ”</li>--}}
                        <li></li>{{$comment->userName()}}<small>————来自：{{ $comment->userName() }}&nbsp发表于{{$comment->created_at}}</small></li>
                        @can('destroy',$comment)
                            <a href="javascript:deleteConfirm2({{ $comment->id }});" class="btn btn-danger btn-sm">删除评论</a>

                            {{--  因为删除也需要 csrf 令牌认证，所以弄个表单  --}}
                            <form method="POST" action="{{ route('comment.destroy', $comment->id) }}" id="delete-comment-{{ $comment->id }}">
                                @csrf
                                {{--  这里伪造DELETE请求  --}}
                                @method("DELETE")
                            </form>
                        @endcan
                    @endforeach
                </ul>


            </div>
        </div>
    </div>

@endsection
