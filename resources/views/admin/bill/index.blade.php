@extends('admin.app')
@section('content')



    <div class="container">
        <div class="mb-2">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createBillModal">
                Tạo hóa đơn mới
            </button>

            @include('admin.bill.components.add')
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID hóa đơn</th>
                    <th scope="col">Tên hóa đơn</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody> @foreach ($bills as $bill) <tr>
                <td>{{$bill->id}}</td>
                <td>{{$bill->name}}</td>
                <td><a href="{{route('bills.show', ['id' => $bill->id])}}" class="btn btn-info btn-md">Xem trạng thái
                        thanh
                        toán</a>
                </td>
            </tr> @endforeach </tbody>
        </table>
    </div>
@endsection