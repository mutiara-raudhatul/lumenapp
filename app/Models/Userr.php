<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userr extends Model

{

    protected $table = 'instansi';

    protected $fillable = [

        'nik', 'namalengkap', 'jeniskelamin', 'tempatlahir', 'tgllahir', 'email', 'password', 'token', 'created_at', 'updated_at',    
    ];

}