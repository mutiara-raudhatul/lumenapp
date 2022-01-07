<?php

namespace App\Http\Controllers;

use App\Models\Userr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'nik' => 'required|unique:userr',
            'username' => 'required',
            'namalengkap' => 'required',
            'jeniskelamin' => 'required',
            'tempatlahir' => 'required',
            'tgllahir' => 'required',
            'email' => 'required|unique:userr|email',
            'password' => 'required|min:6'
        ]);

        $nik = $request->input('nik');
        $username = $request->input('username');
        $namalengkap = $request->input('namalengkap');
        $jeniskelamin = $request->input('jeniskelamin');
        $tempatlahir = $request->input('tempatlahir');
        $tgllahir = $request->input('tgllahir');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        $register = Userr::create([
            'nik' => $nik,
            'username' => $username,
            'namalengkap' => $namalengkap,
            'jeniskelamin' => $jeniskelamin,
            'tempatlahir' => $tempatlahir,
            'tgllahir' => $tgllahir,
            'email' => $email,
            'password' => $password
        ]);

        if($register){
            return response()->json([
                'success' => true,
                'message' => 'Registrasi Berhasil!',
                'data'=> $register
            ], 201);                
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Registrasi Gagal!',
                'data'=> ''
            ], 400); 
        }
        
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        $userr = Userr::where('username', $username)->first();
        if (!$userr) {
            return response()->json(['message' => 'Login failed'], 401);
        }

        $ValidPassword = Hash::check($password, $userr->password);
        if ($ValidPassword) {
            $generateToken = bin2hex(random_bytes(40));
            $userr->update([
                'token' => $generateToken
            ]);

            return response()->json([
                'success'=> true,
                'message' => 'Login success',
                'data'=> [
                    'user'=> $userr,
                    'token'=>$generateToken
                ]
            ], 401);
        } else {
            return response()->json([
                'success'=> false,
                'message' => 'Login failed',
                'data'=> ''
            ], 401);
        }

        // $generateToken = bin2hex(random_bytes(40));


        // return response()->json($userr);
    }

    public function logout(Request $request){
        $userr = \Auth::userr();
        $userr->token = null;
        $userr->save();

        return response()->json(['message' => 'Pengguna telah logout']);
    }
}

