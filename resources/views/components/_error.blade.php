{{--  判断是否有错误  --}}
@if (count($errors) > 0)
    <div class="alert alert-danger">
        {{--  遍历所有错误  --}}
        @foreach ($errors->all() as $error)
            <ul>
                {{--  打印错误  --}}
                <li> {{ $error }}</li>
            </ul>
        @endforeach
    </div>
@endif