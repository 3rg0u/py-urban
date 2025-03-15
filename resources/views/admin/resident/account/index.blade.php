@extends('admin.app')
@section('content')

    <div class="container">
        <button type="button" class="btn add-button" data-bs-toggle="modal" data-bs-target="#createServiceModal">
            Tạo tài khoản mới
        </button>
        <div class="modal fade" id="createServiceModal" tabindex="-1" aria-labelledby="createServiceModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createServiceModalLabel">Tạo tài khoản mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('residents.account.create') }}" method="POST" id="create_account">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required>
                                <label for="apart_id">Mã căn hộ</label>
                                <select name="apart_id" class="form-control">
                                    @foreach($aparts as $apart)
                                        <option value="{{ $apart->id }}">{{ $apart->id }}</option>
                                    @endforeach
                                </select>

                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="password" id="password" required>

                                <label>Xác nhận mật khẩu</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-success">Tạo tài khoản</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-4">
        <div class="table-container">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Số căn hộ/nhà</th>
                        <th scope="col">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $account) 
                    <tr>
                        <td>{{$account->email}}</td>
                        <td>{{$account->apart_id}}</td>
                        <td>
                            <button type="button" class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#editAccountModal_{{$account->id}}">
                                Chỉnh sửa thông tin
                            </button>                    
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#_editAccountPW_{{$account->id}}">
                                Đổi mật khẩu
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#_dropAccount_{{$account->id}}">
                                Xóa tài khoản
                            </button>
                            <div class="modal fade" id="editAccountModal_{{$account->id}}" tabindex="-1" aria-labelledby="editAccountModalLabel_{{$account->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editAccountModalLabel_{{$account->id}}">Chỉnh sửa tài khoản</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('residents.account.edit', ['id' => $account->id])}}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name='email' value='{{$account->email}}' required>
                            
                                                    <label for="apart_id">Mã căn hộ</label>
                                                    <select name="apart_id" class="form-control">
                                                        <option value="{{$account->apart_id}}">{{$account->apart_id}}</option>
                                                        @foreach($aparts as $apart)
                                                            <option value="{{ $apart->id }}">{{ $apart->id }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                    <button type="submit" class="btn btn-success">Lưu</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                            @include('admin.resident.account.components.delete', ['account' => $account])
                            @include('admin.resident.account.components.editpass', ['account' => $account])
                        </td>
                    </tr> 
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
    

@endsection