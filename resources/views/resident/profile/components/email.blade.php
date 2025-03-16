<div class="modal fade" id="_editEmail_{{$user->id}}" tabindex="-1" aria-labelledby="editEmail" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmail">Cập nhật thông tin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('resident.profile.update.email', ['id' => $user->id])}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">Địa chỉ email mới</label>
                        <input type="email" class="form-control" id="email" name='email' required
                            aria-describedby="emailHelp">
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