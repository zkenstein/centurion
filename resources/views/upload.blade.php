@extends('template.header')
@section('content')
<!-- Body -->
        <div class="col-12 tab-content-wrapper">
            <div class="col-10 col-offset-1 tab-content">
                <div class="col-12 tab-content-head">
                    <table class="col-12">
                        <tr>
                            <td><img src="{{ asset('assets') }}/images/logo.svg" width="150"></td>
                            <td><h3>Upload Documents <br> Koperasi Centurion</h3></td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 tab-content-action">
                    <ul>
                        <li>
                            <button class="btn-primary" onClick="back();"> 
                                <span class="plus"></span> Kembali
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="col-12 tab-content-body">
                @include('template.feedback')
                    <form method="POST" action="{{ url('upload/add') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <input type="file" name="doc[]" multiple="multiple" class="input-file" accept=".xlsx,.xls,.doc,.docx">                        
                        <br><br>
                        <button type="submit" class="btn-primary">Upload</button>
                    </form>
                    <table>
                        <thead>
                            <th>NO</th>
                            <th>Nama File</th>
                            <th>Uploaded At</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($result as $row)
                            <tr>
                                <td>{{ !empty($i)?++$i:$i=1 }}</td>
                                <td>{{ $row->file_name }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>
                                    <a href="{{ url("upload/$row->id_upload/down") }}"><button class="btn-warning">Download</button></a>
                                        <form action="{{ url("upload/$row->id_upload/delete") }}" method="POST" style="display:inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                            <button class="btn-dangers">Delete</button>
                                        </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection