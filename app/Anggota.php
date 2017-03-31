<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    public $primaryKey = 'id_anggota';
    protected $table = 'anggota';
    protected $fillable = ['nama', 'alamat','tmp_lhr','tgl_lhr','jk','no_tlp'];
    public $timestamps = false;

    public function login(){
    	return $this->hasOne('\App\User', 'id_anggota', 'id_anggota');
    }
}
