<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class PengaduanController extends Controller

{

    public function index() 

    {

        $data = Pengaduan::latest()->get();

        return response()->json([
            'success' => true,
            'message' =>'Data Pengaduan',
            'data'    => $data
        ], 200);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nopengaduan'   => 'required',
            'nik' => 'required',
            'tglkejadian' => 'required',
            'jeniskejadian' => 'required',
            'lokasikejadian' => 'required',
            'fotokejadian' => 'required',
            'detailkejadian' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);

        } else {
            $pengaduan= Pengaduan::create([
                'nopengaduan'=> $request->input('nopengaduan'),
                'nik'=> $request->input('nik'),
                'tglkejadian'        => $request->input('tglkejadian'),
                'jeniskejadian'       => $request->input('jeniskejadian'),
                'lokasikejadian'    => $request->input('lokasikejadian'),
                'fotokejadian'      => $request->input('fotokejadian'),
                'detailkejadian'      => $request->input('detailkejadian'),
                'created_at'  => $request->input('created_at'),
                'updated_at'  => $request->input('updated_at'),
            ]);

            if ($pengaduan) {

                return response()->json([
                    'success' => true,
                    'message' => 'Data Anda Berhasil Disimpan!',
                    'data' => $pengaduan
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
            'nopengaduan'   => 'required',
            'nik' => 'required',
            'tglkejadian' => 'required',
            'jeniskejadian' => 'required',
            'lokasikejadian' => 'required',
            'fotokejadian' => 'required',
            'detailkejadian' => 'required',
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

            $data = Pengaduan::where('id', $id)->update([
                'nopengaduan'=> $request->input('nopengaduan'),
                'nik'=> $request->input('nik'),
                'tglkejadian'        => $request->input('tglkejadian'),
                'jeniskejadian'       => $request->input('jeniskejadian'),
                'lokasikejadian'    => $request->input('lokasikejadian'),
                'fotokejadian'      => $request->input('fotokejadian'),
                'detailkejadian'      => $request->input('detailkejadian'),
                'created_at'  => $request->input('created_at'),
                'updated_at'  => $request->input('updated_at'),
            ]);

            $pengaduan = Pengaduan::where('id', $id)->get();

            if ($data) {

                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil di update',
                    'data' => $pengaduan
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
         $pengaduan = Pengaduan::whereId($id)->first();
 
         if ($pengaduan != null) {
 
             $pengaduan->delete();
 
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