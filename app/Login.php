<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public $primaryKey = 'id';
    protected $table = 'login';
    protected $fillable = ['username', 'password','level','id_anggota'];
    public $timestamps = false;

    
}
