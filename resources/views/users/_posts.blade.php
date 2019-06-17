@if (count($posts))

    <ul class="list-group mt-4 border-0">

        <table class="table table-striped table-bordered table-hover ">
        <tbody>
        @foreach ($posts as $post)

                <td>
                <a href="{{ route('post.show', $post->id) }}">
                    {{ $post->title }}
                </a>
                </td>

                <td>
                标签：{{ $post->category->name}}
                </td>

                <td>
                发布时间{{$post->created_at}}
                </td>
                <td>
           回复数{{ $post->reply_count }}
          <span> ⋅ </span>
          </td>
          <td>
          <form method="POST" action="{{ route('post.destroy', $post->id) }}" >
                                  @csrf
           <input class="btn btn-success" type="submit" value="删除">
                                  {{--  这里伪造DELETE请求  --}}
                                  @method("DELETE")
           </form>
            </td>
            <td>
            <a href="{{ route('post.edit', $post->id) }}" >
           <input class="btn btn-success" type="submit" value="修改" href="{{ route('post.edit', $post->id) }}">
            </a>


          </td>
            </tr>

        @endforeach
    </ul>


@else
    <div class="empty-block">暂无数据 ~_~ </div>
@endif

{{-- 分页 --}}
<div class="mt-4 pt-1">
    {!! $posts->render() !!}
</div>
