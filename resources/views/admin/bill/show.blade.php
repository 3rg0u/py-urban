@extends('admin.app')


@section('content')
    <a href="{{route('bills.index')}}" class="btn btn-md btn-secondary">Trở lại</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID căn hộ</th>
                <th scope="col">Số tiền</th>
                <th scope="col">Trạng thái thanh toán</th>
                <th scope="col">Ngày thanh toán</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paid_bills as $bill)
                <tr>
                    <td>{{$bill->apart_id}}</td>
                    <td><span class="price-display">{{$bill->price}}</span><span class="h6"> vnd</span></td>
                    <td>
                        @if ($bill->state == 0)
                            <button class="btn btn-md btn-danger">Chưa thanh toán</button>
                        @else
                            <button class="btn btn-md btn-success">Đã thanh toán</button>
                        @endif
                    </td>
                    <td>{{$bill->paid_date}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection