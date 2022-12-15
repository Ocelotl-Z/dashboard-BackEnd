<?php

namespace App\Http\Controllers\Api;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    use PasswordValidationRules;
    public function register(Request $request)
    {
        // VALIDACION DE DATOS
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ]);

        if ($validator->fails()) {
            return response($validator->errors()->toJson(), Response::HTTP_BAD_REQUEST);
        }

        // ALTA DE USUARIO
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //RESPUESTA
        return response($user, Response::HTTP_CREATED);
    }

    public function login(Request $request)
    {
        // VALIDACION DE DATOS
        $credentials = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required'],
        ]);

        if ($credentials->fails()) {
            return response($credentials->errors()->toJson(), Response::HTTP_BAD_REQUEST);
        }

        //LOGIN
        if (Auth::attempt($credentials->getData())) {
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;

            $user = [
                'id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'photo_url' => auth()->user()->profile_photo_url,
                'full_name' => auth()->user()->full_name,
                'roles' => auth()->user()->getRoleNames(),
            ];

            $cookie = cookie('cookie_token', $token, 60 * 24);
            return response(["token" => $token, "user" => $user], Response::HTTP_OK)->withCookie($cookie);
        } else if (Auth::guard('company')->attempt($credentials->getData())) {
            $userAuth = Auth::guard('company')->user();

            $token = $userAuth->createToken('token')->plainTextToken;
            $user = [
                'id' => $userAuth->id,
                'name' => $userAuth->name,
                'email' => $userAuth->email,
                'full_name' => $userAuth->full_name,
                'profile_photo_path'=>$userAuth->profile_photo_url,
                'roles' => Auth::guard('company')->user()->getRoleNames(),
            ];
            return response(["token" => $token, "user" =>  $user], Response::HTTP_OK);
        } else {
            return response(["message" => "The provided credentials do not match our records."], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function userProfile()
    {
        $user = [
            'id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'profile_photo_path' => auth()->user()->profile_photo_url,
            'roles' => auth()->user()->getRoleNames(),
        ];
        return response([$user], Response::HTTP_OK);
    }

    public function logout(Request $request)
    {
        $cookie = Cookie::forget('cookie_token');
        $user = Auth::user();
        $user->tokens()->delete();
        return response(["message" => "Logout OK"], Response::HTTP_OK)->withCookie($cookie);
    }
}
