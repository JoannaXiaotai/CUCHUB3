@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">编辑帖子</div>

                <div class="card-body">
                    {{-- action需要声明当前编辑的文章编号$post->id --}}
                    <form method="POST" action="{{ route('post.update', $post->id) }}">
                        {{--  声明 csrf 令牌  --}}
                        @csrf
                        {{--  伪造 PATCH 方法  --}}
                        @method("PATCH")
                        <div class="form-group">
                            <label for="title">标题</label>
                            <input type="text" class="form-control" id="title" placeholder="请输入文章标题" name="title" value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label for="content">内容</label>
                            <textarea id="content" cols="30" rows="10" class="form-control" name="content">{{ $post->content }}</textarea>
                        </div>
                        <p>发表于<small>{{ $post->created_at }}</small></p>
                        <p>修改于<small>{{ $post->updated_at }}</small></p>
                        <button class="btn btn-primary" type="submit">确认编辑</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection