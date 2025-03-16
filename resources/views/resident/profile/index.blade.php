@extends('resident.app')


@section('content')

    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
        <div class="card p-4">
            <div class=" image d-flex flex-column justify-content-center align-items-center">
                <button class="btn btn-secondary">
                    <img src="https://i.ibb.co/XfSxBRpW/courier-avatar-icon-eps-10-free-vector.jpg" height="100"
                        width="100" />
                </button>
                <span class="name mt-3 h5">Cư dân PyUrban</span>
                <span class="name mt-3">Mã số căn hộ: {{$user->apart_id}}</span>
                <span class="idd">Địa chỉ email: <span class="btn-link">{{$user->email}}</span></span>
                <div class=" d-flex mt-2 gap-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#_editEmail_{{$user->id}}">
                        Cập nhật địa chỉ email
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#_editPW_{{$user->id}}">
                        Thay đổi mật khẩu
                    </button>
                    @include('resident.profile.components.email', ['user' => $user])
                    @include('resident.profile.components.password', ['user' => $user])
                </div>
            </div>
        </div>
    </div>

@endsection