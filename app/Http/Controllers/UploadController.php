<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Auth;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result'] = DB::table('upload')->where('id_anggota', '=', Auth::user()->id_anggota)->get();
        return view('upload')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'doc' => 'required',
        ];

        $this->validate($request,$rules);
        $input = $request->all();
        $status = false;
        if($request->hasFile('doc')){
            foreach ($request->file('doc') as $key) {
                $filename = $key->getClientOriginalName();
                $result = \App\Upload::where([
                    ['file_name', '=', $filename],
                    ['id_anggota', '=', Auth::user()->id_anggota],
                ])->first();
                if(count($result)==0){
                    //$destinationPath = sprintf("uploads\\".Auth::user()->id_anggota);
                    $path = $key->storeAs(Auth::user()->id_anggota,$key->getClientOriginalName());
                    //$path = sprintf(Auth::user()->id_anggota."\\".$key->getClientOriginalName());
                    $input['id_anggota'] = Auth::user()->id_anggota;
                    $input['file_name'] = $filename;
                    $input['path'] = $path;
                    $status = \App\Upload::create($input);
                }
            }
        }
        
        if($status) return redirect('upload')->with('success', 'File berhasil diupload');
        else return redirect('upload')->with('error', 'File gagal diupload | File already exist.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = \App\Upload::where('id_upload', $id)->first();
        //echo public_path($result->path);
        unlink(public_path("uploads/".$result->path));
        $result->delete();

        return redirect('upload');
    }

    public function download($id){
        $result = \App\Upload::where('id_upload', $id)->first();
        return response()->download(public_path("uploads/".$result->path));
    }
}
