@extends('admin.app')


@section('content')

    <div class="container">
        <button type="button" class="btn add-button" onclick="window.location.href='{{ route('residents.infor.index') }}'">
            Quay lại
        </button>
    </div>

    <div class="container mt-4">
        <div class="table-container">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th scope="col">Số CCCD</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Vai trò</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($residents as $resident)
                        <tr>
                            <td>{{$resident->id}}</td>
                            <td>{{$resident->name}}</td>
                            <td>{{$resident->host}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#_editInfor_{{$resident->id}}">
                                    Chỉnh sửa thông tin
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#_dropInfor_{{$resident->id}}">
                                    Xóa cư dân
                                </button>
                                @include('admin.resident.information.components.edit', ['resident' => $resident, 'aparts' => $aparts])
                                @include('admin.resident.information.components.delete', ['resident' => $resident])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection