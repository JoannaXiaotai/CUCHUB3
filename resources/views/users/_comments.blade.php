@if (count($comments))

    <ul class="list-group mt-4 border-0">

            <table class="table table-striped table-bordered table-hover ">
            <tbody>
            @foreach ($comments as $comment)
            @if($comment->post)

            <td>
            您在
            <a href="{{ route('post.show', $comment->post->id) }}">
                {{$comment->post->title}}
            </a>
            评论了
            </td>
            <td>
             {{$comment->content}}
             </td>
             <td>
             <form method="POST" action="{{ route('comment.destroy', $comment->id) }}" >
                                               @csrf
                        <input class="btn btn-success" type="submit" value="删除">
                                               {{--  这里伪造DELETE请求  --}}
                                               @method("DELETE")
            </form>
             </td>

            @endif
            @endforeach
        </ul>

@else
    <div class="empty-block">暂无数据 ~_~ </div>
@endif

{{-- 分页 --}}

<div class="mt-4 pt-1">
    {!! $comments->appends(Request::except('page'))->render() !!}
</div>
