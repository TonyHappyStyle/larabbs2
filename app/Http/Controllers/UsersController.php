<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Http\Requests\UserRequest;
use App\Handlers\ImagesHandler;

class UsersController extends Controller
{
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    public function edit(User $user){
        return view('users.edit',compact('user'));
    }

    public function update(UserRequest $request,User $user,ImagesHandler $imagesHandler){
        $data = $request->all();

        $result = $imagesHandler->save($data['avatar'],'avatars',$user->id,400);

        if($result){
            $data['avatar'] = $result['path'];
        }

        $user->update($data);
        return redirect()->route('users.show',$user->id)->with('success','个人资料更新成功！');
    }
}
