<?php

namespace App\Http\Controllers;

use App\Models\Edukasi;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class EdukasiController extends Controller

{

    public function index() 

    {

        $data = Edukasi::latest()->get();

        return response()->json([

            'success' => true,

            'message' =>'Data Edukasi',

            'data'    => $data

        ], 200);

    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'kodedukasi'   => 'required',
            'jenisedukasi' => 'required',
            'kodeinstansi' => 'required',
            'informasi' => 'required',
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
            $edukasi= Edukasi::create([
                'kodedukasi'=> $request->input('kodedukasi'),
                'jenisedukasi'=> $request->input('jenisedukasi'),
                'kodeinstansi'        => $request->input('kodeinstansi'),
                'informasi'       => $request->input('informasi'),
                'created_at'  => $request->input('created_at'),
                'updated_at'  => $request->input('updated_at'),
            ]);

            if ($edukasi) {

                return response()->json([
                    'success' => true,
                    'message' => 'Data Anda Berhasil Disimpan!',
                    'data' => $edukasi
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
            'kodedukasi'   => 'required',
            'jenisedukasi' => 'required',
            'kodeinstansi' => 'required',
            'informasi' => 'required',
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

            $data = Edukasi::where('id', $id)->update([
                'kodedukasi'=> $request->input('kodedukasi'),
                'jenisedukasi'=> $request->input('jenisedukasi'),
                'kodeinstansi'        => $request->input('kodeinstansi'),
                'informasi'       => $request->input('informasi'),
                'created_at'  => $request->input('created_at'),
                'updated_at'  => $request->input('updated_at'),
            ]);

            $edukasi = Edukasi::where('id', $id)->get();

            if ($data) {

                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil di update',
                    'data' => $edukasi
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
         $edukasi = Edukasi::whereId($id)->first();
 
         if ($edukasi != null) {
 
             $edukasi->delete();
 
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