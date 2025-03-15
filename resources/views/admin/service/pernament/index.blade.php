@extends('admin.app')


@section('content')
    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createServiceModal">
            Thêm dịch vụ
        </button>

        @include('admin.service.common.add', ['type' => 'pernament'])
    </div>
    @foreach ($services as $service)
        @include('admin.service.common.card', ['service' => $service, 'type' => 'pernament'])
    @endforeach




@endsection