<div class="modal fade" id="_editInfor_{{$resident->id}}" tabindex="-1" aria-labelledby="editInfor" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfor">Chỉnh sửa thông tin cư dân</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('residents.infor.edit', ['id' => $resident->id])}}" method="POST">
                    @method('PUT')
                    @csrf
                    <label>Số CCCD:</label>
                    <input type="text" class="form-control" name='id' value="{{$resident->id}}" required>
                    <label>Họ và tên:</label>
                    <input type="text" class="form-control" name='name' value='{{$resident->name}}' required>
                    <label for="apart_id">Mã căn hộ:</label>
                    <select name="apart_id" class="form-control">
                        @foreach($aparts as $apart)
                            <option value="{{ $apart->id }}">{{ $apart->id }}</option>
                        @endforeach
                    </select>
                    <label for="host">Vai trò:</label>
                    <select name="host" id='host' class="form-control">
                        <option value="member" selected>Thành viên</option>
                        <option value="host">Chủ hộ</option>
                    </select>
                    <div id='email_field' hidden>
                        <label for="email">Email:</label>
                        <input class="form-control" type="email" name="email" id="email">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>