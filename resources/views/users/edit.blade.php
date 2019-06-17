@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8 offset-md-2">

            <div class="card">
                <div class="card-header">
                    <h4>
                        <i class="glyphicon glyphicon-edit"></i> 编辑个人资料
                    </h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('users.update', $user->id) }}" method="POST"
                          accept-charset="UTF-8"
                          enctype="multipart/form-data">
{{--                    <form class="form-inline" action="{{ route('users.update', $user->id) }}" method="post" >--}}
                   <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   @include('components._error')
                   <table class="table table-striped table-bordered table-hover ">
                       <tr>
                           <th>用户名</th>
                           <td>
                               <input class="form-control" type="text" name="name" value="{{ old('name', $user->name) }}">
                           </td>
                       </tr>
                       <tr>
                           <th>邮箱</th>
                           <td>
                               <input class="form-control" type="text" name="email" value="{{ old('email', $user->email) }}">
                           </td>
                       </tr>
                       <tr>
                             <th>简介</th>
                             <td>
                                 <input class="form-control" type="text" name="introduction" value="{{ old('introduction', $user->introduction) }}" rows="3">
                             </td>
                       </tr>
                        <tr>
                           <th>新密码</th>
                           <td>
                               <input class="form-control" type="text" name="password" >
                           </td>
                       </tr>
                       <tr>
                          <th>确认密码</th>
                          <td>
                              <input class="form-control" type="text" name="password_confirmation" >
                          </td>
                      </tr>
                       <tr>

                         <th>头像</th>
                         <td>

                             <input type="file" name="avatar" class="form-control-file">

                             @if($user->avatar)
                                 <br>
                                 <img class="thumbnail img-responsive" src="{{ $user->avatar }}" width="200" />
                             @endif
                         </td>
                     </tr>


                       <tr>
                           <th></th>
                           <td>
                               <input class="btn btn-success" type="submit" value="确认">
                           </td>
                       </tr>
                   </table>
               </form>



                </div>
            </div>
        </div>
    </div>

@endsection
