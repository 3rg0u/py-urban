@extends('admin.app')


@section('content')

    <a href="{{route('residents.account.create')}}" class="btn btn-md btn-success">Tạo tài khoản mới</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">mail</th>
                <th scope="col">apart_id</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <td>{{$account->email}}</td>
                    <td>{{$account->apart_id}}</td>
                    <td><a href="{{route('residents.account.edit', ['id' => $account->id])}}" class="btn btn-info btn-md">Chỉnh
                            sửa thông tin</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection