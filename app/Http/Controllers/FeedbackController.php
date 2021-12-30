<?php

namespace App\Http\Controllers;

use App\Models\Feedback;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller

{

    public function index() 

    {

        $data = Feedback::latest()->get();

        return response()->json([

            'success' => true,

            'message' =>'Data Feedback',

            'data'    => $data

        ], 200);

    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'kodefeedback'   => 'required',
            'nik' => 'required',
            'kodeinstansi' => 'required',
            'kodeedukasi' => 'required',
            'feedback' => 'required',
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
            $feedback= Feedback::create([
                'kodefeedback'=> $request->input('kodefeedback'),
                'nik'=> $request->input('nik'),
                'kodeinstansi'        => $request->input('kodeinstansi'),
                'kodeedukasi'       => $request->input('kodeedukasi'),
                'feedback'    => $request->input('feedback'),
                'created_at'  => $request->input('created_at'),
                'updated_at'  => $request->input('updated_at'),
            ]);

            if ($feedback) {

                return response()->json([
                    'success' => true,
                    'message' => 'Data Anda Berhasil Disimpan!',
                    'data' => $feedback
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
            'kodefeedback'   => 'required',
            'nik' => 'required',
            'kodeinstansi' => 'required',
            'kodeedukasi' => 'required',
            'feedback' => 'required',
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

            $data = Feedback::where('id', $id)->update([
                'kodefeedback'=> $request->input('kodefeedback'),
                'nik'=> $request->input('nik'),
                'kodeinstansi'        => $request->input('kodeinstansi'),
                'kodeedukasi'       => $request->input('kodeedukasi'),
                'feedback'    => $request->input('feedback'),
                'created_at'  => $request->input('created_at'),
                'updated_at'  => $request->input('updated_at'),
            ]);

            $feedback = Feedback::where('id', $id)->get();

            if ($data) {

                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil di update',
                    'data' => $feedback
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
        $feedback = Feedback::whereId($id)->first();

        if ($feedback != null) {

            $feedback->delete();

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