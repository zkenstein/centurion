<?php

use Illuminate\Database\Seeder;

class LoginSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User;
        $user->username = 'admin';
        $user->password = bcrypt('admin');
        $user->level = '1';
        $user->id_anggota = '0';
        $user->save();
    }
}
