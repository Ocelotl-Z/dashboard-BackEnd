<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
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

        // //LOGIN

        if (Auth::guard('company')->attempt($credentials->getData())) {
            $user = Auth::guard('company')->user();
            return response(["user" => $user], Response::HTTP_OK);
        } else {
            return response(["message" => "The provided credentials do not match our records."], Response::HTTP_UNAUTHORIZED);
        }
        // if (Auth::attempt($credentials->getData())) {
        //     $user = Auth::user();
        //     $token = $user->createToken('token')->plainTextToken;
        //     $cookie = cookie('cookie_token', $token, 60 * 24);
        //     return response(["token" => $token, "user" => $user], Response::HTTP_OK)->withCookie($cookie);
        // } else {
        //     return response(["message" => "The provided credentials do not match our records."], Response::HTTP_UNAUTHORIZED);
        // }
    }
}
