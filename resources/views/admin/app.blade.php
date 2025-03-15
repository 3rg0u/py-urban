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
    .table-container {
        height: 80vh;
        width: 100%;
        overflow-x: auto;
        margin-top: 20px;
        box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.4);
        border-radius: 15px 15px 5px 5px; 
    }

    .table {
        border-collapse: collapse;
        width: 100%;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .table th,
    .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #001226;
        color: white;
        text-transform: uppercase;
    }

    .even-row {
        background-color: #f9f9f9;
    }

    .odd-row {
        background-color: #ffffff;
    }

    .table tr:hover {
        background-color: #a1c4f2;
    }

    .black {
        color: black !important;
    }


    .add-button{
        background-color: #00626d;
        color: white;
        box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.6);
    }

    .add-button:hover {
        background-color: #4ea8b1;
        color: rgb(255, 255, 255);
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
                <li><a href="{{route('services.pernament.index')}}" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-list"></i>Dịch vụ cố định</a></li>
            </ul>
            <ul class="list-unstyled px-2">
                <li><a href="{{route('services.subscription.index')}}" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-list"></i>Dịch vụ định kỳ</a></li>
            </ul>
            <ul class="list-unstyled px-2">
                <li><a class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-list"></i>Quản lý hóa đơn</a></li>
            </ul>
            <ul class="list-unstyled px-2">
                <li><a href='{{route('residents.account.index')}}' class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-list"></i>Quản lý tài khoản cư dân</a></li>
            </ul>
            <ul class="list-unstyled px-2">
                <li><a href='{{route('residents.infor.index')}}' class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-list"></i>Quản lý thông tin cư dân</a></li>
            </ul>

            <hr class="h-color mx-2">



            <ul class="list-unstyled px-2">
                <li>
                    <a href="{{ route('profile.edit') }}" class="text-decoration-none px-3 py-2 d-block">
                        <i class="fal fa-list"></i>
                        <div class="dashboard-button">
                            Thông tin cá nhân 
                        </div>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="btn btn-link logout-a" style="text-decoration: none">
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