<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AnggotaController extends Controller
{
    public function index(){
    	$data['result'] = \App\Anggota::all();
    	return view('anggota')->with($data);
    }

    public function create(){
    	return view('form_anggota');
    }

    public function store(Request $request){

    	$rules = [
    		'nama' => 'required',
    		'alamat' => 'required',
    		'tmp_lhr' => 'required',
    		'tgl_lhr' => 'required',
    		'jk' => 'required',
    		'no_tlp' => 'required',
    		'username' => 'required|unique:login',
    		'password' => 'required|min:6',
    	];

    	$this->validate($request,$rules);

    	$input = $request->all();
    	$angg['nama'] = $input['nama'];
    	$angg['alamat'] = $input['alamat'];
    	$angg['tmp_lhr'] = $input['tmp_lhr'];
    	$angg['tgl_lhr'] = $input['tgl_lhr'];
    	$angg['jk'] = $input['jk'];
    	$angg['no_tlp'] = $input['no_tlp'];
    	$id = \App\Anggota::insertGetId($angg);
    	$login['username'] = $input['username'];
    	$login['password'] = bcrypt($input['password']);
    	$login['level'] = '2';
    	$login['id_anggota'] = $id;
    	$status = \App\Login::create($login);

    	if($status) return redirect('anggota')->with('success', 'Data berhasil ditambahkan');
    	else return redirect('anggota')->with('error', 'Data gagal ditambahkan');
    }

    public function edit($id){
    	$data['result'] = \App\Anggota::where('id_anggota',$id)->first();
    	return view('form_anggota')->with($data);
    }

    public function update(Request $request, $id){
    	$rules = [
    		'nama' => 'required',
    		'alamat' => 'required',
    		'tmp_lhr' => 'required',
    		'tgl_lhr' => 'required',
    		'jk' => 'required',
    		'no_tlp' => 'required',
    		'username' => 'required|unique:login',
    	];

    	$this->validate($request,$rules);

    	$input = $request->all();
    	$result = \App\Anggota::where('id_anggota',$id)->first();
    	$reslogin = \App\Login::where('id_anggota',$id)->first();
    	$status = $result->update($input);
    	$login = $reslogin->update($input);

    	if($login) return redirect('anggota')->with('success', 'Data berhasil diubah');
    	else return redirect('anggota')->with('error', 'Data gagal diubah');
    }

    public function destroy(Request $request, $id){
    	$result = \App\Anggota::where('id_anggota',$id)->first();
    	$reslogin = \App\Login::where('id_anggota',$id)->first();
    	$status = $result->delete();
    	$login = $reslogin->delete();

    	if($login) return redirect('anggota')->with('success', 'Data berhasil dihapus');
    	else return redirect('anggota')->with('error', 'Data gagal dihapus');
    }
}
