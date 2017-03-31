@extends('template.header')
@section('content')
        <div class="col-12 tab-content-wrapper">
            <div class="col-10 col-offset-1 tab-content">
                <div class="col-12 tab-content-head">
                    <table class="col-12">
                        <tr>
                            <td><img src="{{ asset('assets') }}/images/logo.svg" width="150"></td>
                            <td><h3>Form Anggota <br> Koperasi Centurion</h3></td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 tab-content-action">
                    <ul>
                        <li>
                            <a href="{{ url('anggota') }}">
                                <button class="btn-primary"> 
                                    <span class="plus"></span> Kembali
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 tab-content-body">
                @include('template.feedback')
                    <form method="POST" action="{{ empty($result)?url('anggota/add'):url("anggota/$result->id_anggota/edit") }}">
                    {{ csrf_field() }}
                    @if(!empty($result))
                        {{ method_field('patch') }}
                    @endif
                        <input class="input-default" type="text" name="nama" placeholder="Nama Anggota" value="{{ @$result->nama }}">
                        <input class="input-default" type="text" name="tmp_lhr" placeholder="Tempat Lahir" value="{{ @$result->tmp_lhr }}">
                        <input class="input-default date" type="date" name="tgl_lhr" data-tip="Tanggal Lahir" value="{{ @$result->tgl_lhr }}">
                        <textarea name="alamat" placeholder="Alamat">{{ @$result->alamat }}</textarea>
                        <div class="radio-group">    
                            <input type="radio" name="jk" value="L" {{ @$result->jk=="L"?'checked':'' }}> Laki - laki 
                            <input type="radio" name="jk" value="P" {{ @$result->jk=="P"?'checked':'' }}> Perempuan 
                        </div>
                        <input class="input-default" type="text" name="no_tlp" placeholder="Telepon" value="{{ @$result->no_tlp }}">
                        <input class="input-default" type="text" name="username" placeholder="Username" value="{{ @$result->login->username }}">
                        @if(empty($result))
                        <input class="input-default" type="password" name="password" placeholder="Password">
                        @endif
                        <br><br>
                        <button type="submit" class="btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
@endsection