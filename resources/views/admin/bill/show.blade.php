@extends('admin.app')


@section('content')
    <a href="{{route('bills.index')}}" class="btn btn-md btn-secondary">Trở lại</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID căn hộ</th>
                <th scope="col">Trạng thái thanh toán</th>
                <th scope="col">Ngày thanh toán</th>
                <th scope="col">Số tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paid_bills as $bill)
                <tr>
                    <td>{{$bill->apart_id}}</td>
                    <td>{{$bill->state}}</td>
                    <td>{{$bill->paid_date}}</td>
                    <td>{{$bill->price}}</td>
                    {{-- <td>
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
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection