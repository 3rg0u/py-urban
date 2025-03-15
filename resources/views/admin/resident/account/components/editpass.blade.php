<div class="modal fade" id="_editAccountPW_{{$account->id}}" tabindex="-1" aria-labelledby="editAccoutPW"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAccoutPW">Thay đổi mật khẩu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('residents.account.editpw', ['id' => $account->id])}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="password">Mật khẩu mới</label>
                        <input type="text" class="form-control" name='password' id='password' required minlength="8">
                        <label for="password">Xác nhận mật khẩu mới</label>
                        <input type="text" class="form-control" name='password_confirmation' id='password_confirmation'
                            required minlength="8">
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