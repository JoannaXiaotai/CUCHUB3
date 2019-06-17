<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    public function show(User $user)
    {

        return view('users.show', compact('user'));
    }
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    public function update(UserRequest $request,ImageUploadHandler $uploader, User $user)
    {
        //dd($request);
        if(!$request['password']){
            $user->update($request->except('_token','password','password_confirmation'));
        }
        else{
            $this->validate($request,[
                                        'password'=>['required'//不为空
                                         ],
                                        'password_confirmation'=>['required',"same:password"//不为空,两次密码是否相同
                                         ],


                                ],[
                                        'password.required'=>"密码不能为空",
                                        'password_confirmation.required'=>"确认密码不能为空",
                                        'password_confirmation.same'=>'密码与确认密码不匹配',
                                ]);
            $request['password']=Hash::make( $request['password']);
            $user->update($request->except('_token','password_confirmation'));
        }

        if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', $user->id);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
            $user->update($data);
        }

        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}
