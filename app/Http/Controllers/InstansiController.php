<?php

namespace App\Http\Controllers;

use App\Models\Instansi;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class InstansiController extends Controller

{

    public function index() 
    {

        $data = Instansi::latest()->get();
        return response()->json([
            'success' => true,
            'message' =>'Data Instansi',
            'data'    => $data
        ], 200);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kodeinstansi'   => 'required',
            'namainstansi' => 'required',
            'nohp' => 'required',
            'email' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
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
            $instansi= Instansi::create([
                'kodeinstansi'=> $request->input('kodeinstansi'),
                'namainstansi'=> $request->input('namainstansi'),
                'nohp'        => $request->input('nohp'),
                'email'       => $request->input('email'),
                'kategori'    => $request->input('kategori'),
                'lokasi'      => $request->input('lokasi'),
                'created_at'  => $request->input('created_at'),
                'updated_at'  => $request->input('updated_at'),
            ]);

            if ($instansi) {

                return response()->json([
                    'success' => true,
                    'message' => 'Data Anda Berhasil Disimpan!',
                    'data' => $instansi
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
            'namainstansi' => 'required',
            'nohp' => 'required',
            'email' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
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

            $data = Instansi::where('id', $id)->update([
                'namainstansi'=> $request->input('namainstansi'),
                'nohp'        => $request->input('nohp'),
                'email'       => $request->input('email'),
                'kategori'    => $request->input('kategori'),
                'lokasi'      => $request->input('lokasi'),
                'created_at'  => $request->input('created_at'),
                'updated_at'  => $request->input('updated_at'),
            ]);

            $instansi = Instansi::where('id', $id)->get();

            if ($data) {

                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil di update',
                    'data' => $instansi
                ], 201);

            } else {

                return response()->json([
                    'success' => false,
                    'message' => 'biodata Gagal Diupdate!',
                ], 400);
            }
        }
    }

    public function delete($id)
   {
        $instansi = Instansi::whereId($id)->first();

        if ($instansi != null) {

            $instansi->delete();

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
    // if(function_exists($_GET['function'])) {
    //     $_GET['function']();
    // }   
    // public function get_instansi()
    //     {
    //         global $connect;      
    //         $query = $connect->query("SELECT * FROM instansi");            
    //         while($row=mysqli_fetch_object($query))
    //         {
    //             $data[] =$row;
    //         }
    //         $response=array(
    //                         'status' => 1,
    //                         'message' =>'Success',
    //                         'data' => $data
    //                     );
    //         header('Content-Type: application/json');
    //         echo json_encode($response);
    //     }   
        
    //     function get_instansi_id()
    //     {
    //         global $connect;
    //         if (!empty($_GET["id"])) {
    //             $id = $_GET["id"];      
    //         }            
    //         $query ="SELECT * FROM instansi WHERE id= $id";      
    //         $result = $connect->query($query);
    //         while($row = mysqli_fetch_object($result))
    //         {
    //             $data[] = $row;
    //         }            
    //         if($data)
    //         {
    //         $response = array(
    //                         'status' => 1,
    //                         'message' =>'Success',
    //                         'data' => $data
    //                     );               
    //         }else {
    //             $response=array(
    //                         'status' => 0,
    //                         'message' =>'No Data Found'
    //                     );
    //         }
            
    //         header('Content-Type: application/json');
    //         echo json_encode($response);
            
    //     }
    //     function insert_instansi()
    //         {
    //             global $connect;   
    //             $check = array('id' => '', 'kodeinstansi' => '', 'namainstansi' => '', 'nohp' => '', 'email' => '', 'kategori' => '', 'lokasi' => '', 'created_at' => '', 'update_at' => '');
    //             $check_match = count(array_intersect_key($_POST, $check));
    //             if($check_match == count($check)){
                
    //                 $result = mysqli_query($connect, "INSERT INTO instansi SET
    //                 id = '$_POST[id]',
    //                 kodeinstansi = '$_POST[kodeinstansi]',
    //                 namainstansi = '$_POST[namainstansi]',
    //                 nohp = '$_POST[nohp]',
    //                 email = '$_POST[email]',
    //                 kategori = '$_POST[kategori]',
    //                 lokasi = '$_POST[lokasi]',
    //                 created_at = '$_POST[created_at]',
    //                 update_at = '$_POST[update_at]'");
                    
    //                 if($result)
    //                 {
    //                     $response=array(
    //                         'status' => 1,
    //                         'message' =>'Insert Success'
    //                     );
    //                 }
    //                 else
    //                 {
    //                     $response=array(
    //                         'status' => 0,
    //                         'message' =>'Insert Failed.'
    //                     );
    //                 }
    //             }else{
    //             $response=array(
    //                         'status' => 0,
    //                         'message' =>'Wrong Parameter'
    //                     );
    //             }
    //             header('Content-Type: application/json');
    //             echo json_encode($response);
    //         }
    //     function update_instansi()
    //         {
    //             global $connect;
    //             if (!empty($_GET["id"])) {
    //             $id = $_GET["id"];      
    //         }   
    //             $check = array('kodeinstansi' => '', 'namainstansi' => '', 'nohp' => '', 'email' => '', 'kategori' => '', 'lokasi' => '', 'created_at' => '', 'update_at' => '');
    //             $check_match = count(array_intersect_key($_POST, $check));         
    //             if($check_match == count($check)){
                
    //                 $result = mysqli_query($connect, "UPDATE karyawan SET               
    //                 kodeinstansi = '$_POST[kodeinstansi]',
    //                 namainstansi = '$_POST[namainstansi]',
    //                 nohp = '$_POST[nohp]',
    //                 email = '$_POST[email]',
    //                 kategori = '$_POST[kategori]',
    //                 lokasi = '$_POST[lokasi]',
    //                 created_at = '$_POST[created_at]',
    //                 update_at = '$_POST[update_at]' WHERE id = $id");
                
    //             if($result)
    //             {
    //                 $response=array(
    //                     'status' => 1,
    //                     'message' =>'Update Success'                  
    //                 );
    //             }
    //             else
    //             {
    //                 $response=array(
    //                     'status' => 0,
    //                     'message' =>'Update Failed'                  
    //                 );
    //             }
    //             }else{
    //             $response=array(
    //                         'status' => 0,
    //                         'message' =>'Wrong Parameter',
    //                         'data'=> $id
    //                     );
    //             }
    //             header('Content-Type: application/json');
    //             echo json_encode($response);
    //         }
    //     function delete_instansi()
    //     {
    //         global $connect;
    //         $id = $_GET['id'];
    //         $query = "DELETE FROM instansi WHERE id=".$id;
    //         if(mysqli_query($connect, $query))
    //         {
    //             $response=array(
    //             'status' => 1,
    //             'message' =>'Delete Success'
    //             );
    //         }
    //         else
    //         {
    //             $response=array(
    //             'status' => 0,
    //             'message' =>'Delete Fail.'
    //             );
    //         }
    //         header('Content-Type: application/json');
    //         echo json_encode($response);
    //     }

