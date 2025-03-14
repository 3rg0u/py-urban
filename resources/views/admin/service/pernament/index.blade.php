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
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif
    @if ($errors->any())
        <script>
            let errMsg = @json($errors->all()).join('\n');
            Swal.fire({
                icon: 'error',
                title: 'Đã xảy ra lỗi',
                text: errMsg,
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif



@endsection