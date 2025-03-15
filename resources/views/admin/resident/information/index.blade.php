@extends('admin.app')
@section('content')
    <a href="{{route('residents.infor.create')}}" class="btn btn-md btn-success">Thêm cư dân mới</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID căn hộ</th>
                <th scope="col">Diện tích</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody> @foreach ($aparts as $apart) <tr>
            <td>{{$apart->id}}</td>
            <td>{{$apart->area}}</td>
            <td><a href="{{route('residents.infor.list', ['id' => $apart->id])}}" class="btn btn-info btn-md">Xem danh
                    sách cư dân</a>
            </td>
        </tr> @endforeach </tbody>
    </table>
@endsection