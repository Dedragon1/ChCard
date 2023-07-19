<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class UserController extends Controller
{

    //use HasFactory, Notifiable, HasApiTokens;

    public function loginUser(Request $request): Response
    {

        $input = $request->all();
        
        Auth::attempt($input);
        
        /** @var \App\Models\User $user **/
        $user = Auth::user();
        
        //$token = $user->createToken('My Token', ['place-orders'])->accessToken;
        $token = $user->createToken('example')->accessToken;

        //dd($token);

        return Response(['status' => 200, 'token' => $token], 200);
    }

    public function getUserDetail(): Response
    {

        $user = Auth::guard('api')->user();
        return Response(['data' => $user], 200);

    }

    public function userLogout()
    {

        $accessToken = Auth::guard('api')->user()->token();
            
        DB::table('oauth_refresh_tokens')
                ->where('access_token_id', $accessToken->id)
                ->update(['revoked' => true]);
            
        $accessToken->revoke();

        return Response(['data' => 'Разавтаризован', 'massage' => 'Пользователь вышел из системы'], 200);

    }

    ////////////////////////////////////////////////

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