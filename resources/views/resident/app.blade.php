@extends('layouts.master')


@section('body')

    <style>

        body {
            background: #eee;
        }

        #side_nav {
            background: #000;
            min-width: 250px;
            max-width: 250px;
            transition: all 0.3s;
        }

        .content {
            min-height: 100vh;
            width: 100%;
        }

        hr.h-color {
            background: #eee;
        }

        .sidebar li.active {
            background: #eee;
            border-radius: 8px;
        }

        .sidebar li.active a,
        .sidebar li.active a:hover {
            color: #000;
        }

        .sidebar li a {
            color: #fff;
        }

        .logo-div {
            width: 100%;
            height: 60px;
            background-color: white;
        }

        .logo-div img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


        @media(max-width: 767px) {
            #side_nav {
                margin-left: -250px;
                position: absolute;
                min-height: 100vh;
                z-index: 1;
            }

            #side_nav.active {
                margin-left: 0;
            }
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            justify-items: center;
        }

        .card {
            width: 252px;
            height: 300px;
            background: white;
            border-radius: 30px;
            box-shadow: 15px 15px 30px #bebebe,
                        -15px -15px 30px #ffffff;
            transition: 0.2s ease-in-out;
        }

        .img {
            width: 100%;
            height: 50%;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            background: linear-gradient(#e66465, #9198e5);
            display: flex;
            align-items: top;
            justify-content: right;
        }

        .save {
            transition: 0.2s ease-in-out;
            border-radius: 10px;
            margin: 20px;
            width: 30px;
            height: 30px;
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .text {
            margin: 20px;
            display: flex;
            flex-direction: column;
            align-items: space-around;
        }

        .save .svg {
            transition: 0.2s ease-in-out;
            width: 15px;
            height: 15px;
        }



        .back-div{
            padding: 10px;
            width: 70%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #e3fff9;
            border-radius: 10px;
        }



        .text .h3 {
            font-family: 'Lucida Sans' sans-serif;
            font-size: 15px;
            font-weight: 600;
            color: black;
        }

        .text .p {
            font-family: 'Lucida Sans' sans-serif;
            color: #999999;
            font-size: 13px;
        }


        .card:hover {
            cursor: pointer;
            box-shadow: 0px 10px 20px rgba(0,0,0,0.1);
        }

        .save:hover {
            transform: scale(1.1) rotate(10deg);
        }

        .save:hover .svg {
            fill: #ced8de;
        }

        .bnt{
            margin-top: 10px;
            height: 40px; 
            background-color: rgb(6, 164, 255);
            border-radius: 10px;
            color: white;
            box-shadow: 0px 2px 5px rgba(0,0,0,0.3);
        }

        .bnt:hover{
            background-color: rgb(0, 93, 146);
            color: white;
        }

    </style>

    <div class="main-container d-flex">
        <div class="sidebar sidebar-custome" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <div class="logo-div">
                    <img href="/" src="{{ asset('assets/logo/PYURBAN-logo.png') }}" alt="logo">
                </div>
            </div>
            <ul class="list-unstyled px-2">
                <li><a href="{{route('resident.services.registration.index')}}"
                        class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-list"></i>Đăng ký dịch vụ</a></li>
            </ul>
            <ul class="list-unstyled px-2">
                <li><a href="{{route('resident.services.registration.enrolled')}}"
                        class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-list"></i>Dịch vụ đã đăng ký</a>
                </li>
            </ul>
            <ul class="list-unstyled px-2">
                <li><a href='{{route('resident.bills.index')}}' class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-list"></i>Quản lý hóa đơn</a></li>
            </ul>

            <hr class="h-color mx-2">

            <ul class="list-unstyled px-2">
                <li>
                    <a href="{{ route('resident.profile.index') }}" class="text-decoration-none px-3 py-2 d-block">
                        <i class="fal fa-list"></i>
                        <div class="dashboard-button">
                            Thông tin cá nhân
                        </div>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                            class="btn btn-danger logout-a" style="text-decoration: none">
                            {{ __('Đăng xuất') }}
                        </a>
                    </form>
                </li>
            </ul>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between d-md-none d-block">
                        <button class="btn px-1 py-0 open-btn me-2"><i class="fal fa-stream"></i></button>
                        <a class="navbar-brand fs-4" href="#"><span
                                class="bg-dark rounded px-2 py-0 text-white">CL</span></a>

                    </div>
                    <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fal fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page">
                                    @php
                                        $roleText = auth()->user()->role === 'manager' ? 'ban quản lý' : 'cư dân';
                                        $userName = auth()->user()->name ?? null;
                                    @endphp
                                    Xin chào {{ $roleText }}{{ $userName ? ' (' . $userName . ')' : ' !'  }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="dashboard-content px-3 pt-4">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

@endsection