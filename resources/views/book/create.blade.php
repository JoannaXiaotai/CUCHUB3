@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">发布图书</div>

                <div class="card-body">
                    {{--  from.method="POST" action="通过 route()函数读取路由别名 " --}}
                    <form method="POST" action="{{ route('book.store') }}">
                        {{--  声明 csrf 令牌  --}}
                        @csrf

     <div class="form-group">
         <label for="title">图书ISBN</label>
         <input type="text" class="form-control" id="isbn" placeholder="请输入书背ISBN码" name="isbn" >
     </div>
     <div class="form-group">
         <label for="content">您的定价</label>
         <input type="text" class="form-control" id="price" placeholder="请输入您的意向价格" name="price" >
     </div>
     <div class="form-group">
         <label for="content">描述</label>
         <input type="text" class="form-control" id="description" placeholder="描述" name="description" >
     </div>
     <button class="btn btn-primary" type="submit">发布图书</button>
 </form>
</div>
</div>
</div>
</div>

@endsection