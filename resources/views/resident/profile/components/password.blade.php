<div class="modal fade" id="_editPW_{{$user->id}}" tabindex="-1" aria-labelledby="editPW" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPW">Cập nhật thông tin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('resident.profile.update.pw', ['id' => $user->id])}}" method="POST" id='updatepw'>
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="old_pass" class="form-label">Mật khẩu cũ:</label>
                        <input type="password" class="form-control" id="old_pass" name='old_pass'
                            aria-describedby="emailHelp" required>
                        <label for="new_pass" class="form-label">Mật khẩu mới:</label>
                        <input type="password" class="form-control" id="new_pass" name='new_pass'
                            aria-describedby="emailHelp" required>
                        <label for="new_pass_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
                        <input type="password" class="form-control" id="new_pass_confirmation"
                            name='new_pass_confirmation' aria-describedby="emailHelp" required>
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


<script>
    document.getElementById('updatepw').addEventListener('submit', function (event) {

        var password = document.getElementById('new_pass').value;
        var confirmPassword = document.getElementById('new_pass_confirmation').value;

        if (password !== confirmPassword) {
            event.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Đã xảy ra lỗi',
                text: 'Mật khẩu không khớp!',
                timer: 3000,
                showConfirmButton: false
            });
        }
    });
</script>