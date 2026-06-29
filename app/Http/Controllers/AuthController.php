<?php

namespace App\Http\Controllers;

use App\Models\Korisnik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=>'required|email|unique:korisnici,email',
            'lozinka'=>'required|string|min:6|confirmed',
            'rola'=>'required|string|in:standardni,moderator',
        ]);
        if ($validator->fails()){
           return response()->json([
            'message'=>'Validacija nije uspela.',
            'errors'=>$validator->errors()
           ], 422);
        }
        $korisnik=Korisnik::create([
            'email'=>$request->email,
            'lozinka'=>Hash::make($request->lozinka),
            'rola'=>$request->rola,
        ]);
        $token=JWTAuth::fromUser($korisnik);
        return response()->json([
            'message'=>'Uspešna registracija.',
            'korisnik'=>$korisnik,
            'token'=>$token,
        ],201);
    }



    public function login(Request $request){
        $validator=Validator::make($request->all(),[
        'email'=>'required|email',
        'lozinka'=>'required|string',
    ]);
    if ($validator->fails()){
        return response()->json([
            'message'=>'Validacija nije uspela.',
            'errors'=>$validator->errors(),
        ],422);         
        }
    $credentials=[
        'email'=>$request->email,
        'password'=>$request->lozinka,
    ];
    if (!$token=JWTAuth::attempt($credentials)){
        return response()->json([
            'message'=>'Neispravni kredencijali.',
        ],401);
    }
    return response()->json([
        'message'=>'Prijava uspešna.',
        'korisnik'=>auth('api')->user(),
        'token'=>$token,
    ],200);
    }


    public function logout(Request $request){
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json([
            'message'=>'Uspešna odjava.',
        ],200);
    }


    public function me(Request $request){
        return response()->json(auth('api')->user());
    }
}
