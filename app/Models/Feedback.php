<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model

{

    protected $table = 'feedback';

    protected $fillable = [

        'kodefeedback', 'nik', 'kodeinstansi', 'kodeedukasi', 'feedback', 'created_at', 'updated_at',
    
    ];

}