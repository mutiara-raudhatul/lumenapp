<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Edukasi extends Model

{

    protected $table = 'edukasi';

    protected $fillable = [

        'kodedukasi', 'jenisedukasi', 'kodeinstansi', 'informasi', 'created_at', 'updated_at',
    
    ];

}