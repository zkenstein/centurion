<!DOCTYPE html>
<html>
    <head>
        <title>Koperasi Centurion</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
        <link rel="shortcut icon" href="{{ asset('assets') }}/images/icon.png">
    </head>
    <body>
        <!-- Header -->
        <header class="col-12 nav-bar">
            <div class="col-2 brand">
                <a href="{{ url('home') }}"><img src="{{ asset('assets') }}/images/logotext.svg"></a>
            </div>
            <div class="col-6 nav-list">
                <ul>
                @if(Auth::user() != null)
                    <a class="link-ul" href="{{ url('anggota') }}"><li>Anggota </li></a>
                    
                    <a class="link-ul" href="{{ url('upload') }}"><li><button class="btn-default">Upload</button></li></a>
                @endif
                </ul>
            </div>
            <div class="col-1 dropdown acc">
                @if(Auth::user() != null)
                      <button onclick="showContent()" class="dropbtn btn-primary" style="text-transform:Capitalize;">{{ Auth::user()->username }} <span class="caret"></span></button>
                        <div id="dropcontent" class="dropdown-content">
                            <form method="POST" action="{{ url('logout') }}">
                            {{ csrf_field() }}
                                <button type="submit" class="dropbtn btn-default">Logout</button>
                            </form>
                        </div>  
                @else
                        <button onclick="showContent()" class="dropbtn btn-primary">Masuk</button>
                        <div id="dropcontent" class="dropdown-content">
                            <a class="link-def" href="{{ url('login') }}">Login</a>
                            <a class="link-def" href="{{ url('register') }}">Sign Up</a>
                        </div>  
                @endif
            </div>  
        </header>
        @yield('content')
        @include('template.footer')