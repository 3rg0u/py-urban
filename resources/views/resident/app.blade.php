{{-- @extends('layouts.master')


@section('body')

    <div class="container-fluid d-flex flex-row">
        <div class="navbar d-flex flex-column">
            <a href="{{route('services.pernament.index')}}" class="btn btn-md btn-primary mt-4">Dịch vụ cố định</a>
            <a href="{{route('services.subscription.index')}}" class="btn btn-md btn-primary mt-4">Dịch vụ định kỳ</a>
            <a href="" class="btn btn-md btn-primary mt-4">Quản lý hóa đơn</a>
            <a href="" class="btn btn-md btn-primary mt-4">Quản lý cư dân</a>
        </div>
        <div>
            @yield('content')
        </div>
    </div>
@endsection
 --}}


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
                <li><a class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-list"></i>Quản lý tài khoản cư dân</a></li>
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
                                <a class="nav-link active" aria-current="page" href="#">Profile</a>
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