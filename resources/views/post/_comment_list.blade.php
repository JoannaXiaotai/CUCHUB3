<ul class="list-unstyled">
    @foreach ($comments as $index => $comment)
        <li class=" media" name="comment{{ $comment->id }}" id="comment{{ $comment->id }}">
            <div class="media-left">
                <a href="{{ route('users.show', [$comment->user_id]) }}">
                    <img class="media-object img-thumbnail mr-3" alt="{{ $comment->user->name }}" src="{{ $comment->user->avatar }}" style="width:48px;height:48px;" />
                </a>
            </div>

            <div class="media-body">
                <div class="media-heading mt-0 mb-1 text-secondary">
                    <a href="{{ route('users.show', [$comment->user_id]) }}" title="{{ $comment->user->name }}">
                        {{ $comment->user->name }}
                    </a>
                    <span class="text-secondary"> • </span>
                    <span class="meta text-secondary" title="{{ $comment->created_at }}">{{ $comment->created_at->diffForHumans() }}</span>

                    {{-- 回复删除按钮 --}}
                    @can('destroy', $comment)
                        <span class="meta float-right">
              <form action="{{ route('comment.destroy', $comment->id) }}"
                    onsubmit="return confirm('确定要删除此评论？');"
                    method="post">
                {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-default btn-xs pull-left text-secondary">
                  <i class="far fa-trash-alt"></i>
                </button>
              </form>
            </span>
                    @endcan
                    {{--<span class="meta float-right ">--}}
            {{--<a title="删除回复">--}}
              {{--<i class="far fa-trash-alt"></i>--}}
            {{--</a>--}}
          {{--</span>--}}
                </div>
                <div class="reply-content text-secondary">
                    {!! $comment->content !!}
                </div>
            </div>
        </li>

        @if ( ! $loop->last)
            <hr>
        @endif

    @endforeach
</ul>