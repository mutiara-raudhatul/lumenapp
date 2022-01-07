<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Edukasi extends Model

{

    protected $table = 'edukasi';

    protected $fillable = [

        'kodedukasi', 'jenisedukasi', 'kodeinstansi', 'tanggalpost', 'kategoriedu', 'judul', 'informasi'
    
    ];

}