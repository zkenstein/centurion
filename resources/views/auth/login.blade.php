@extends('template.header')
@section('content')
<!-- Body -->
        <div class="col-12">
            <div class="col-4 col-offset-4 user-form">
                <img src="{{ asset('assets') }}/images/user.png" width="150">
                @include('template.feedback')
                <form method="post" action="{{ url('login') }}">
                {{ csrf_field() }}
                    <input class="input-default" type="text" name="username" placeholder="Username"><br>
                    <input class="input-default" type="password" name="password" placeholder="Password"><br><br>
                    <button type="submit" class="btn-primary">Masuk</button><br><br>
                    <span class="link-2"><a href="{{ url('register') }}">Belum memiliki akun koperasi Centurion ?</a></span>
                </form>
            </div>
        </div>
@endsection