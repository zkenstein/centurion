<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => 'required|max:255',
            'username' => 'required|max:255|unique:login',
            'password' => 'required|min:3',
            'alamat' => 'required',
            'tmp_lhr' => 'required',
            'tgl_lhr' => 'required',
            'jk' => 'required',
            'no_tlp' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $angg['nama'] = $data['nama'];
        $angg['alamat'] = $data['alamat'];
        $angg['tmp_lhr'] = $data['tmp_lhr'];
        $angg['tgl_lhr'] = $data['tgl_lhr'];
        $angg['jk'] = $data['jk'];
        $angg['no_tlp'] = $data['no_tlp'];
        $id = \App\Anggota::insertGetId($angg);
        $login['username'] = $data['username'];
        $login['password'] = bcrypt($data['password']);
        $login['level'] = '2';
        $login['id_anggota'] = $id;
        return \App\User::create($login);
        //return User::create([
        //    'name' => $data['name'],
        //    'email' => $data['email'],
        //    'password' => bcrypt($data['password']),
        //]);
    }
}
