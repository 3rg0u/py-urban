@extends('welcome.welcome-content-app')

@section('welcome-content')

<style>

    @font-face {
        font-family: 'DuneFont';
        src: url('{{ asset("assets/fonts/Dune_Rise.ttf") }}') format('truetype'),
            url('{{ asset("assets/fonts/Dune_Rise.otf") }}') format('opentype');
        font-weight: normal;
        font-style: normal;
    }

    .login-div{
        height: 100vh;
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-a{
        font-size: 30px;
        color: black;
        font-family: 'DuneFont';
        font-weight: 700;
    }

    .login-back-div{
        height: 55%;
        width: 50%;
        border-radius: 30px;
        overflow: hidden;
        position: relative;
    }

    .login-back-div video{
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .content-login-back-div{
        position: absolute;
        z-index: 1;
        left: 0;
        top: 0;
        height: 100%;
        width: 50%;
        background-color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 35px;
    }

    .form-control {
        border: 1px solid #ccc;
        border-radius: 4px; 
    }

    .login-a{
        font-size: 30px;
        color: black;
        font-family: 'DuneFont';
        font-weight: 700;
    }

    .reset-pass-a{
        font-size: 20px;
        color: black;
        font-family: 'DuneFont';
        font-weight: 700;
    }

    .form-control {
        border: 1px solid #ccc;
        border-radius: 4px; 
    }

    .form-control:focus {
        border-color: #8B4513; 
        box-shadow: 0 0 0 0.1rem rgba(139, 69, 19, 0.8); 
    }

    .btn-brown {
        background-color: #8B4513; 
        border-color: #441c00; 
        color: white;
    }
    .btn-brown:hover {
        background-color: #fc822b; 
        border-color: #441c00; 
    }
    
    
</style>


<div class="login-div">
    <div class="login-back-div">
        <video autoplay loop muted>
            <source src="{{ asset('assets/videos/back-auth.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="content-login-back-div">
            @yield('authentication-content')
        </div>
    </div>
</div>

@endsection
