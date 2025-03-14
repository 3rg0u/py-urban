@extends('layouts.master')


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