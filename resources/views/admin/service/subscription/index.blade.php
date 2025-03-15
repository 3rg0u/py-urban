@extends('admin.app')

@section('content')
    <style>
        .table-container {
            overflow-x: auto;
            margin-top: 20px;
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
    </style>

    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createServiceModal">
            Thêm dịch vụ
        </button>

        @include('admin.service.common.add', ['type' => 'subscription'])
    </div>

    <div class="container mt-4">
        <div class="table-container">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr class="{{ $loop->index % 2 == 0 ? 'even-row' : 'odd-row' }}">
                            <td>{{$service->id}}</td>
                            <td>{{$service->name}}</td>
                            <td>{{$service->price}}</td>
                            <td>{{$service->type}}</td>
                            <td><button class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#_editService_{{$service->id}}">
                                    Chỉnh sửa
                                </button>
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#_dropService_{{$service->id}}">
                                    Hủy dịch vụ
                                </button>
                                @include('admin.service.common.edit', ['service' => $service, 'type' => 'subscription'])
                                @include('admin.service.common.delete', ['service' => $service, 'type' => 'subscription'])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



    {{-- @foreach ($services as $service)
    @include('admin.service.common.card', ['service' => $service, 'type' => 'subscription'])
    @endforeach --}}

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