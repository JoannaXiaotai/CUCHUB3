<div class="container">
    {{--  遍历 success danger 这两个我们等会会在 session->flash() 方法中设置的"key"  --}}
    @foreach (['success', 'danger'] as $msg)
        {{--  当key存在的时候，证明我们给 session flash 闪存里面装载了一次提示信息，那么就显示提示信息  --}}
        @if (session()->has($msg))
            <div class="alert alert-{{ $msg }}">
                <ul>
                    <li>{{ session()->get($msg) }}</li>
                </ul>
            </div>
        @endif
    @endforeach
</div>