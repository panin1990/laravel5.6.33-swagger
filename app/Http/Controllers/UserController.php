<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public $successStatus = 200;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            foreach($user->tokens as $token) {
                $token->revoke();
            }
            $success['token'] =  $user->createToken('userPrivateToken')->accessToken;
            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this-> successStatus);
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }

    public function attachRole(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'roles' => 'required|array',
            'roles.*' => 'integer|exists:roles,id'
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $user = User::find($request->all()['user_id']);
        $user->roles()->syncWithoutDetaching($request->all()['roles']);
        $user = $user->fresh();
        return response()->json($user);
    }

    public function detachRole(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'roles' => 'required|array',
            'roles.*' => 'integer'
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $user = User::find($request->all()['user_id']);
        $user->roles()->detach($request->all()['roles']);
        $user = $user->fresh();
        return response()->json($user);
    }

    public function attachScope(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'scopes' => 'required|array',
            'scopes.*' => 'integer|exists:scopes,id'
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $user = User::find($request->all()['user_id']);
        $user->scopes()->syncWithoutDetaching($request->all()['scopes']);
        $user = $user->fresh();
        return response()->json($user);
    }

    public function detachScope(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'scopes' => 'required|array',
            'scopes.*' => 'integer'
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $user = User::find($request->all()['user_id']);
        $user->scopes()->detach($request->all()['scopes']);
        $user = $user->fresh();
        return response()->json($user);
    }

    public function getScopes()
    {

    }
}