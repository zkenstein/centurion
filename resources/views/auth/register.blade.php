@extends('template.header')
@section('content')
<!-- Body -->
<div class="col-12">
    <div class="col-4 col-offset-4 reg-form">
        <img src="{{ asset('assets') }}/images/user.png" width="150">
        @include('template.feedback')
        <form method="POST" action="{{ url('register') }}">
        {{ csrf_field() }}
            <input class="input-default" type="text" name="nama" placeholder="Nama Lengkap"><br>
            <input class="input-default" type="text" name="tmp_lhr" placeholder="Tempat Lahir"><br>
            <input class="input-default" type="date" name="tgl_lhr" style="text-transform:uppercase"><br><br>
            <div class="radio-jk">   
                <input type="radio"  name="jk" value="L"> Laki-laki &nbsp;
                <input type="radio"  name="jk" value="P"> Perempuan<br><br>
            </div>
            <textarea name="alamat" placeholder="Alamat"></textarea><br>
            <input class="input-default" type="text" name="no_tlp" placeholder="No. Telepon"><br><br>
            <input class="input-default" type="text" name="username" placeholder="Username"><br>
            <input class="input-default" type="password" name="password" placeholder="Password"><br><br>
            <button type="submit" class="btn-primary">Daftar</button><br><br>
            <span class="link-2"><a href="{{ url('login') }}">Sudah memiliki akun koperasi Centurion ?</a></span>
        </form>
    </div>
</div>
@endsection
