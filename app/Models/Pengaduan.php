<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model

{

    protected $table = 'pengaduan';

    protected $fillable = [

        'nopengaduan', 'nik', 'tglkejadian', 'jeniskejadian', 'lokasikejadian', 'fotokejadian', 'detailkejadian',
    
    ];

}