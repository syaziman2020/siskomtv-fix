<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\DataPegawai;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        try {

            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);
            // dd($data);
            $credentials = request([
                'email', 'password'
            ]);


            $user = User::where('email', $request->email)->first();


            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $token = $user->createToken('My Token')->plainTextToken;

                return ResponseFormatter::success([
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'user' => $user,
                ], 'Authenticated');
            } else {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized',
                ], 'Authentication Failed', 500);
            }
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }



    public function fetch(Request $request)
    {
        $user = Auth::user();



        $pegawai = DataPegawai::with('user')->where('users_id', $user->id)->first();

        $pegawai['image'] = url('/storage') . '/' . $pegawai->image;

        return ResponseFormatter::success($pegawai, 'Data profile user berhasil diambil');
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();
        return ResponseFormatter::success($token, 'Token revoked');
    }

    public function updateProfile(Request $request)
    {


        $user = Auth::user();
        $result = User::where('id', $user->id)->first();
        // $cek = $result->pegawai;


        $result->name = $request->name;


        $result->save();

        $pegawai = DataPegawai::where('users_id', $user->id)->first();

        $pegawai->name = $request->name;
        $pegawai->status = $request->status;

        $pegawai->save();


        return ResponseFormatter::success([], 'Profile update');
    }
}
