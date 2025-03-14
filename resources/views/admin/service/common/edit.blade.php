<div class="modal fade" id="_editService_{{$service->id}}" tabindex="-1" aria-labelledby="editServiceLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editServiceLabel">Sửa đổi thông tin dịch vụ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('services.' . $type . '.edit', ['id' => $service->id])}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Tên dịch vụ</label>
                        <input type="text" class="form-control" name='name' required value="{{$service->name}}">
                        <label>Giá tiền</label>
                        <input type='number' class="form-control" name='price' required min="10000"
                            value="{{$service->price}}">
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