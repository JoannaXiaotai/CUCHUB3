@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">发表帖子</div>

                <div class="card-body">
                    {{--  from.method="POST" action="通过 route()函数读取路由别名 " --}}
                    <form method="POST" action="{{ route('post.store') }}">
                        {{--  声明 csrf 令牌  --}}
                        @csrf
                        <div class="form-group">
                            <label for="title">标题</label>
                            <input type="text" class="form-control" id="title" placeholder="请输入文章标题" name="title">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="category_id" required>
                                <option value="" hidden disabled selected>请选择分类</option>
                                @foreach ($categories as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">内容</label>
                            <textarea id="content" cols="30" rows="10" class="form-control" name="content"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">发布新帖子</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection