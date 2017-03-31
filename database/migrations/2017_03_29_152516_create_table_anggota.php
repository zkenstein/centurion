<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAnggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function(Blueprint $table){
            $table->increments('id_anggota');
            $table->string('nama',200);
            $table->text('alamat');
            $table->string('tmp_lhr',50);
            $table->date('tgl_lhr');
            $table->string('jk',1);
            $table->string('no_tlp',12);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota');
    }
}
