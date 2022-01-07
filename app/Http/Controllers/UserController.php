<?php

namespace App\Http\Controllers;
use App\Models\Userr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function register(Request $request){
    //     $this->validate($request, [
    //         'email' => 'required|unique:users|email',
    //         'password' => 'required|min:6'
    //     ]);
    //     $email = $request->input('email');
    //     $password = Hash::make($request->input('password'));

    //     $register = User::create([
    //         'email' => $email,
    //         'password' => $password
    //     ]);

    //     if($register){
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Registrasi Berhasil!',
    //             'data'=> $register
    //         ], 201);                
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Registrasi Gagal!',
    //             'data'=> ''
    //         ], 400); 
    //     }
        
    // }

    public function register(Request $request){
        $this->validate($request, [
            'nik' => 'required',
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
}
