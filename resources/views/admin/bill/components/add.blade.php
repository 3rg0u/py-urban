<div class="modal fade" id="createBillModal" tabindex="-1" aria-labelledby="createBillLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBillLabel">Tạo hóa đơn mới</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('bills.create')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tên hóa đơn</label>
                        <input type="text" class="form-control" name='name' required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Tạo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>