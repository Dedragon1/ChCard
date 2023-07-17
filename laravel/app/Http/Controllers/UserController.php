<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(['success' => true, 
                                 'data' => User::all()]);
    }

    public function show($id)
    {

        $user = User::find($id);

        if ($user === null) {

            return response()->json(['success' => false,
                                     'data' => "Пользователь с id = {$id} не найден"]);

        } else {

            return response()->json(['success' => true, 
                                     'data' => $user]);

        }
    }

    public function create(UserCreateRequest $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        
        $user->save();

        return $user;
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);

        if ($user === null) {

            return response()->json(['success' => false,
                                     'data' => "Пользователь с id = {$id} не найден"]);

        } else {
            
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
    
            $user->save();

            return response()->json(['success' => true, 
                                     'data' => $user]);

        }
    }

    public function delete($id)
    {
        $user = User::find($id);

        if ($user === null) {

            return response()->json(['success' => false,
                                     'data' => "Пользователь с id = {$id} не найден"]);

        } else {

            $user->delete();

            return response()->json(['success' => true, 
                                     'data' => $user]);

        }
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        
        if ($user === null) {
            
            return response()->json(['success' => false,
                                     'data' => "Пользователь с id = {$id} не найден"]);

        } else {
            
            $user->restore();
            return response()->json(['success' => true, 
                                     'data' => $user]);
        }
    }
}