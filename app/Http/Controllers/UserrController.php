<?php

namespace App\Http\Controllers;

use App\Userr;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class UserrController extends Controller

{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 

    {

        $data = Userr::latest()->get();
        return response()->json([
            'success' => true,
            'message' =>'Data User',
            'data'    => $data

        ], 200);

    }

    public function show($id) 
    {
        $userr = Userr::find($id);
        if($userr){
            return response()->json([
                'success' => true,
                'message' =>'User Found!',
                'data'    => $userr
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' =>'User Not Found!',
                'data'    => ''
            ], 404);
        }

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik'   => 'required',
            'username'   => 'required',
            'namalengkap' => 'required',
            'jeniskelamin' => 'required',
            'tempatlahir' => 'required',
            'tgllahir' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);

        } else {
            $userr= Userr::create([
                'nik'=> $request->input('nik'),
                'username'=> $request->input('username'),
                'namalengkap'=> $request->input('namalengkap'),
                'jeniskelamin'        => $request->input('jeniskelamin'),
                'tempatlahir'       => $request->input('tempatlahir'),
                'tgllahir'        => $request->input('tgllahir'),
                'email'       => $request->input('email'),
                'password'        => $request->input('password'),
                'token'       => $request->input('token'),
                'created_at'  => $request->input('created_at'),
                'updated_at'  => $request->input('updated_at'),
            ]);

            if ($userr) {

                return response()->json([
                    'success' => true,
                    'message' => 'Data Anda Berhasil Disimpan!',
                    'data' => $userr
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Anda Gagal Disimpan!',
                ], 400);
            }
        }
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'nik'   => 'required',
            'username' => 'required',
            'namalengkap' => 'required',
            'jeniskelamin' => 'required',
            'tempatlahir' => 'required',
            'tgllahir' => 'required',
            'email' => 'required',
            'password' => 'required',
            'token' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'   => false,
                'message'   => 'Semua Inputan Wajib di isi !',
                'data'      => $validator->errors()
            ],401);

        } else {

            $data = Userr::where('id', $id)->update([
                'nik'=> $request->input('nik'),
                'username'=> $request->input('username'),
                'namalengkap'=> $request->input('namalengkap'),
                'jeniskelamin'        => $request->input('jeniskelamin'),
                'tempatlahir'       => $request->input('tempatlahir'),
                'tgllahir'        => $request->input('tgllahir'),
                'email'       => $request->input('email'),
                'password'        => $request->input('password'),
                'token'       => $request->input('token'),
                'created_at'  => $request->input('created_at'),
                'updated_at'  => $request->input('updated_at'),
            ]);

            $userr = Userr::where('id', $id)->get();

            if ($data) {

                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil di update',
                    'data' => $userr
                ], 201);

            } else {

                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Diupdate!',
                ], 400);
            }
        }
    }

    public function delete($id)
    {
         $userr = Userr::whereId($id)->first();
 
         if ($userr != null) {
             $userr->delete();
             return response()->json([
                 'success' => true,
                 'message' => 'Data Berhasil Dihapus!',
             ], 200);
 
        }else{
             return response()->json([
                 'success' => false,
                 'message' => 'Data Gagal di hapus !',
             ], 400);
 
        }
 
     }
}