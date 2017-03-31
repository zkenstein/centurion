<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    public $primaryKey = 'id_upload';
    protected $table = 'upload';
    protected $fillable = ['id_anggota','file_name', 'path','created_at','updated_at'];

    public function anggota(){
    	return $this->hasOne('\App\Anggota', 'id_anggota', 'id_anggota');
    }
}
