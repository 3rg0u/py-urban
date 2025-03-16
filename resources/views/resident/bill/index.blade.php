@extends('resident.app')

@section('content')
    <a href="{{route('resident.bills.index')}}" class="btn btn-md btn-secondary">Trở lại</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID hóa đơn</th>
                <th scope="col">Số tiền</th>
                <th scope="col">Trạng thái thanh toán</th>
                <th scope="col">Ngày thanh toán</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paid_bills as $bill)
                <tr>
                    <td>{{$bill->bill_id}}</td>
                    <td><span class="price-display">{{$bill->price}}</span><span class="h6"> vnd</span></td>
                    <td>
                        @if ($bill->state == 0)
                            Chưa thanh toán
                        @else
                            Đã thanh toán
                        @endif
                    </td>
                    <td>{{$bill->paid_date}}</td>
                    @if ($bill->state == 0)
                        <td><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#_checkoutBill_{{$bill->id}}">
                                Thanh toán
                            </button>
                            @include('resident.bill.components.checkout', ['bill' => $bill])
                        </td>
                    @else
                        <td><button class="btn btn-info">Đã thanh toán</button></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection