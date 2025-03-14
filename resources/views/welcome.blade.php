@extends('welcome.welcome-content-app')

@section('welcome-content')

<style>
    @font-face {
        font-family: 'DuneFont';
        src: url('{{ asset('assets/fonts/Dune_Rise.ttf') }}') format('truetype'),
            url('{{ asset('assets/fonts/Dune_Rise.otf') }}') format('opentype');
        font-weight: normal;
        font-style: normal;
    }

    .paradise-back-div {
        height: 700px;
        width: 100%;
        position: relative;
    }

    .paradise-back-div img {
        position: absolute;
        z-index: 1;
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .paradise-content {
        position: absolute;
        z-index: 2;
        height: 100%;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: start;
        padding: 0px 150px;
    }

    .dune-a {
        text-decoration: none;
        color: #000000;
        font-family: 'DuneFont';
        font-size: 40px;
    }

    .button-start-now {
        padding: 10px 20px;
        background-color: #103341;
        color: white;
    }
</style>

<div class="paradise-back-div">
    <img src="{{ asset('/assets/images/paradise.jpg') }}" alt="paradise">
    <div class="paradise-content">
        <a class="dune-a">Follow us,</a>
        <a class="dune-a">we will lead you to green paradise!</a>
        <a href="">
            <button class="button-start-now">START NOW!</button>
        </a>
    </div>
</div>

@endsection
