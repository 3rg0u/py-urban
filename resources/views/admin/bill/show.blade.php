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
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection