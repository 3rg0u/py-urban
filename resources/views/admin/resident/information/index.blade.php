@extends('admin.app')
@section('content')


    <div class="container">
        <button type="button" class="btn add-button" data-bs-toggle="modal" data-bs-target="#createResidentModal">
            Thêm cư dân mới
        </button>
        <div class="modal fade" id="createResidentModal" tabindex="-1" aria-labelledby="createResidentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createResidentModalLabel">Thêm cư dân mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('residents.infor.create') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Số CCCD:</label>
                                <input type="text" class="form-control" name="id" required>
                                
                                <label>Họ và tên:</label>
                                <input type="text" class="form-control" name="name" required>
                                
                                <label for="apart_id">Mã căn hộ:</label>
                                <select name="apart_id" class="form-control">
                                    @foreach($aparts as $apart)
                                        <option value="{{ $apart->id }}">{{ $apart->id }}</option>
                                    @endforeach
                                </select>
                                
                                <label for="host">Vai trò:</label>
                                <select name="host" id="host" class="form-control">
                                    <option value="member" selected>Thành viên</option>
                                    <option value="host">Chủ hộ</option>
                                </select>
                                
                                <div id="email_field" style="display: none;">
                                    <label for="email">Email:</label>
                                    <input class="form-control" type="email" name="email" id="email">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-success">Tạo</button>
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
                        <th scope="col">ID căn hộ</th>
                        <th scope="col">Diện tích</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aparts as $apart) 
                    <tr>
                    <td>{{$apart->id}}</td>
                    <td>{{$apart->area}}</td>
                    <td>
                        <a href="{{route('residents.infor.list', ['id' => $apart->id])}}" class="btn btn-info btn-md">Xem danh
                            sách cư dân</a>
                    </td>
                </tr> 
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <script>
        document.getElementById('host').addEventListener('change', function (event) {
            if (this.value === 'host') {
                document.getElementById('email_field').hidden = false;
            }
            else {

                document.getElementById('email_field').hidden = true;
            }
        });
    </script>
    

@endsection