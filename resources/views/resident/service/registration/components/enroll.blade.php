<div class="modal fade" id="_enrollService_{{$service->id}}" tabindex="-1" aria-labelledby="enrollServiceLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enrollServiceLabel">Ngừng cung cấp dịch vụ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('resident.services.registration.enroll', ['id' => $service->id])}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <p>Bạn có chắc chắn muốn đăng ký dịch vụ</p>
                        <p>"{{$service->name}}" hay không?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>