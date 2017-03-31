@extends('template.header')
@section('content')
<!-- Body -->
        <div class="col-12 tab-content-wrapper">
            <div class="col-10 col-offset-1 tab-content">
                <div class="col-12 tab-content-head">
                    <table class="col-12">
                        <tr>
                            <td><img src="{{ asset('assets') }}/images/logo.svg" width="150"></td>
                            <td><h3>Anggota Koperasi Centurion</h3></td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 tab-content-body">
                @if(Auth::user()->level==1)
                <a href="{{ url('anggota/add') }}"><button class="btn-primary">Tambah</button></a>
                @endif
                @include('template.feedback')
                    <table>
                        <thead>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Username</th>
                            @if(Auth::user()->level==1)
                            <th></th>
                            @endif
                        </thead>
                        <tbody>
                            @foreach($result as $row)
                            <tr>
                                <td>{{ !empty($i)?++$i:$i=1 }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->tmp_lhr }}</td>
                                <td>{{ $row->tgl_lhr }}</td>
                                <td>{{ $row->jk }}</td>
                                <td>{{ $row->alamat }}</td>
                                <td>{{ $row->no_tlp }}</td>
                                <td>{{ $row->login->username }}</td>
                                @if(Auth::user()->level==1)
                                <td>
                                    
                                        <a href="{{ url("anggota/$row->id_anggota/edit") }}"><button class="btn-warning">Edit</button></a>
                                        <form action="{{ url("anggota/$row->id_anggota/delete") }}" method="POST" style="display:inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                            <button class="btn-dangers">Delete</button>
                                        </form>
                                    
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
