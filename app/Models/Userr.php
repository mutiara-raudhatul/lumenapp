<?php 
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Userr extends Model

{
    use Authenticatable, Authorizable, HasFactory;

    protected $table = 'userr';

    protected $fillable = [

        'nik', 'username', 'namalengkap', 'jeniskelamin', 'tempatlahir', 'tgllahir', 'email', 'password', 'token',    
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'token'
    ];
}
