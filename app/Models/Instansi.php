<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model

{

    protected $table = 'instansi';

    protected $fillable = [

        'kodeinstansi', 'namainstansi', 'nohp', 'email', 'kategori', 'lokasi',
    
    ];

}